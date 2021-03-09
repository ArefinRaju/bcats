<?php

namespace App\Http\Controllers;

use App\Models\User;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\ACL\Roles;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends HelperController
{
    private UserRepository $repo;
    protected array        $commonValidationRules;
    private string         $aclPathParamName;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(User::class);
        $this->commonValidationRules = [
            'name'     => [V::REQUIRED, ...V::NAME],
            'email'    => [V::REQUIRED, V::EMAIL],
            'password' => [V::SOMETIMES, V::REQUIRED, ...V::PASS],
            'mobile'   => [V::REQUIRED, ...V::PHONE],
            'acl'      => [V::SOMETIMES, V::REQUIRED, Rule::in(Roles::values())]
        ];
        $this->aclPathParamName      = 'acl';
    }


    public function createForm()
    {

        return view('admin.pages.user.create');
    }
    public function userList()
    {

        $users = User::all();
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * @param  Request  $request
     * @param  string|null  $action
     * @return mixed
     * @throws UserFriendlyException
     */
    public function create(Request $request, string $action = null)
    {
        // Todo : check name and email and throw proper error
        Acl::authorize($request, [Permission::CREATE_MANAGER, Permission::CREATE_PROJECT_USER]);
        $rules = $this->commonValidationRules;
        $this->validate($request, $rules);
        $input = $this->cherryPick($request, $rules);
        $user  = new User();
        foreach ($input as $prop => $value) {
            if ($prop === 'password' && $value !== "") {
                $value = Hash::make($value);
            }
            $user->{$prop} = $value;
        }
        if (!$user->acl) {
            $user->acl = Roles::EMPLOYEE;
        }
        $user->acl = Acl::createUserRole($user->acl);
        // TOdo : do try and catch to intercept sql fail error
        $this->repo->save($user);
        return $this->respond($user->toArray(), [],'admin.pages.user.create', Messages::USER_CREATED, ResponseType::CREATED);
    }


}
