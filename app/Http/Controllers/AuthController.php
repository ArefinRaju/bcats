<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Helper\Config\ConfigInit;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\JWT;
use Helper\Core\UserFriendlyException;
use Helper\Repo\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $project_id=$request->user()->project_id;
        $sql="SELECT
            SUM(total) AS total,
            SUM(due) AS Due,
            SUM(credit) AS Collect,
            (SELECT
                    COUNT(id)
                FROM
                    users
                WHERE
                    NOT acl = 'QURNSU4=' AND project_id = $project_id) AS members,
            (SELECT
                    COUNT(id)
                FROM
                    payees
                WHERE
                    project_id = $project_id) as supplier
        FROM
            accounts
        WHERE
            project_id = $project_id";

        $data=DB::select($sql);

        $users=User::where('project_id',$request->user()->project_id)->get();

        return view('admin.dashboard')->with('data',$data)->with('users',$users);
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
