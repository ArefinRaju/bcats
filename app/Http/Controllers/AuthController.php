<?php


namespace App\Http\Controllers;


use Helper\ACL\Acl;
use Helper\ACL\Roles;
use Helper\Config\ConfigInit;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\PayeeType;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\JWT;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\EMIRepository;
use Helper\Repo\PayeeRepository;
use Helper\Repo\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function dashBoard(Request $request)
    {
        // Get total amount of admin account.
        $accountRepo = new AccountRepository();
        $emiRepo     = new EMIRepository();

        // Get all Supplier
        $payeeRepo = new PayeeRepository();

        $newUsersData = [
            'emiDue' => $emiRepo->getAllEmiDueByUserAndEmiType($request),
            'otpDue' => $emiRepo->getAllEmiDueByUserAndEmiType($request, true),
        ];

        $data = [
            'users'               => $this->repo->getAllMember($request),
            'amountsData'         => $newUsersData,
            'mainAccountBalance'  => $accountRepo->getMainAccountBalance($request, Acl::createUserRole(Roles::PROJECT_ADMIN)),
            'mainEmployeeBalance' => $accountRepo->getEmployeeAccountBalance($request, Acl::createUserRole(Roles::EMPLOYEE)),
            'payeeCount'          => $payeeRepo->getByType($request, PayeeType::SUPPLIER)->count(),
            'memberCount'         => $this->repo->getByType($request, Roles::MEMBER)->count(),
            'constructorCount'    => $payeeRepo->getByType($request, PayeeType::CONTRACTOR)->count()
        ];
        return $this->respond($data, []);
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
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

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->withErrors([Errors::AUTHENTICATION_FAILED]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function loginPage()
    {
        return view('admin.layouts.login');
    }
}
