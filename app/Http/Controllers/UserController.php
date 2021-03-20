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


    public function createForm(Request $request)
    {
        // Todo : filter by using middleware
        $roles = Roles::toArray();
        unset($roles[Roles::ADMIN]);
        if (Acl::decodeRole($request->user()->acl) !== Roles::ADMIN) {
            unset($roles[Roles::MANAGER]);
        }
        return view('admin.pages.user.create')->with('roles', $roles);
    }

    public function editForm(Request $request, int $id)
    {
        $user = $this->repo->getById($request, $id);
        return view('admin.pages.user.edit', compact('user'));
    }

    /**
     * @param  Request  $request
     * @param  string|null  $action
     * @return mixed
     * @throws UserFriendlyException
     */
    public function create(Request $request, string $action = null)
    {
        // Todo : check name, role(Admin not allowed) and email and throw proper error
        Acl::authorize($request, [Permission::CREATE_MANAGER, Permission::CREATE_PROJECT_USER]);
        $user = new User();
        $user = $this->filterAssign($request, $user);
        $this->repo->save($user);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $users      = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.user.index')->with('data', $users);
        }
        return $this->respond($user, [], 'admin.pages.user.create', Messages::USER_CREATED, ResponseType::CREATED);
    }

    public function retrieve(Request $request, string $id)
    {
        $user = $this->repo->getById($request, $id);
        return $this->respond($user, []);
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $user       = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($user, [], 'admin.pages.user.index');
    }

    public function update(Request $request, string $id = null)
    {
        $user = $this->repo->getById($request, $id);
        $user = $this->filterAssign($request, $user);
        $this->repo->save($user);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $users      = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.user.index')->with('data', $users);
        }
        return $this->respond($user, []);
    }

    /**
     * @param  Request  $request
     * @param  object  $user
     * @return mixed
     * @throws UserFriendlyException
     */
    private function filterAssign(Request $request, object $user): object
    {
        $this->validate($request, $this->commonValidationRules);
        $input = $this->cherryPick($request, $this->commonValidationRules);
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
        return $user;
    }

    public function destroy(Request $request, string $id)
    {
        //   dd($id);
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.user.index')->with('data', $materials);
        }
        return $this->respond(null, [], 'admin.pages.user.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}
