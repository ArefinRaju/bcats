<?php

namespace App\Http\Controllers;

use App\Models\User;
use Helper\ACL\Acl;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\UserRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'mobile'   => [V::REQUIRED, ...V::PHONE]
        ];
        $this->aclPathParamName      = 'acl';
    }


    /**
     * @param  Request  $request
     * @param  string|null  $action
     * @return mixed
     * @throws UserFriendlyException
     */
    public function create(Request $request, string $action = null)
    {
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
        if (!$user->acl){
            $user->acl = Acl::createUserRole();
        }
        //dd($user->toArray());
        $this->repo->save($user);
        return $this->respond($user->toArray(), [], Messages::USER_CREATED, ResponseType::CREATED);
    }
}
