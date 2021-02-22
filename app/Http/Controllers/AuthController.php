<?php


namespace App\Http\Controllers;


use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\UserRepository;
use Illuminate\Http\Request;

class AuthController extends HelperController
{
    private UserRepository $repo;
    protected array        $commonValidationRules;

    public function __construct(UserRepository $repo)
    {
        $this->repo                  = $repo;
        $this->commonValidationRules = [
            'email'    => [V::REQUIRED, V::EMAIL],
            'password' => [V::SOMETIMES, V::REQUIRED, ...V::PASS]
        ];
    }

    public function login(Request $request)
    {
        $token = $request->header('Authorization');
        dd($token);
    }
}