<?php


namespace App\Http\Controllers;


use Helper\Config\ConfigInit;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\JWT;
use Helper\Core\UserFriendlyException;
use Helper\Repo\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends HelperController
{
    private UserRepository $repo;
    protected array        $commonValidationRules;

    public function __construct(UserRepository $repo)
    {
        $this->repo                  = $repo;
        $this->commonValidationRules = [
            'email'    => [V::REQUIRED, V::EMAIL],
            'password' => [V::REQUIRED, ...V::PASS]
        ];
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function apiLogin(Request $request)
    {
        $this->validate($request, $this->commonValidationRules);
        $input = $this->cherryPick($request, $this->commonValidationRules);
        $user  = $this->repo->findByEmail($input['email']);
        if (!$user) {
            throw new UserFriendlyException(Errors::AUTHENTICATION_FAILED, ResponseType::FORBIDDEN);
        }
        if (!empty($user->password) and Hash::check($input['password'], $user->password)) {
            $jwtToken    = JWT::sign(ConfigInit::$appName, $user);
            $stringToken = (string)$jwtToken;
            return $this->respond(['token' => $stringToken]);
        }
        throw new UserFriendlyException(Errors::AUTHENTICATION_FAILED, ResponseType::FORBIDDEN);
    }
}