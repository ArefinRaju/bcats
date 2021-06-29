<?php

namespace App\Http\Controllers;

use App\Models\User;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\ACL\Roles;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\EMIRepository;
use Helper\Repo\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends HelperController
{
    private UserRepository $repo;


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
    }

    public function validation(): array
    {
        $rules        = $this->commonValidationRules;
        $rules['acl'] = [
            'rules' => [V::SOMETIMES, V::REQUIRED],
            'types' => $this->getRules(Request())
        ];
        return $rules;
    }

    public function constants()
    {
        return $this->respond(Roles::values());
    }

    public function createForm(Request $request)
    {
        // Todo : filter by using middleware
        $roles = $this->getRules($request);
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
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     * @throws UserFriendlyException
     */
    public function create(Request $request, string $action = null)
    {
        // Todo : check name, role(Admin not allowed) and email and throw proper error
        Acl::authorize($request, [Permission::CREATE_MANAGER, Permission::CREATE_PROJECT_USER]);
        $user = new User();
        $user = $this->filterAssign($request, $user);
        if ($request->user()->acl !== Roles::ADMIN || $request->user()->acl !== Roles::MANAGER) {
            $user->project_id = $request->user()->project_id;
        }
        $this->repo->save($user);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $users      = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.user.index')->with('data', $users);
        }
        return $this->respond($user, [], 'admin.pages.user.create', Messages::USER_CREATED, ResponseType::CREATED);
    }

    public function retrieve(Request $request, int $id)
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
        $userRole = Acl::getUserRole($request);
        if ($userRole !== Roles::ADMIN || $userRole !== Roles::MANAGER || $request->user()->id !== $id) {
            return $this->respond([], [Errors::FORBIDDEN]);
        }
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
        $rules        = $this->commonValidationRules;
        $rules['acl'] = [V::SOMETIMES, V::REQUIRED, Rule::in($this->getRules($request))];
        $this->validate($request, $rules);
        $input = $this->cherryPick($request, $rules);
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
        throw new UserFriendlyException(Errors::FORBIDDEN);
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.user.index')->with('data', $materials);
        }
        return $this->respond(null, [], 'admin.pages.user.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }

    private function getRules(Request $request): array
    {
        $roles = Roles::toArray();
        unset($roles[Roles::ADMIN]);
        unset($roles[Roles::EMPLOYEE]);
        if (Acl::decodeRole($request->user()->acl) !== Roles::ADMIN) {
            unset($roles[Roles::MANAGER]);
        }
        if (Acl::decodeRole($request->user()->acl) !== Roles::MANAGER) {
            unset($roles[Roles::PROJECT_ADMIN]);
        }
        return $roles;
    }

    /**
     * @throws UserFriendlyException
     */
    public function search(Request $request)
    {
        $rules = [
            'query'      => [V::REQUIRED, V::TEXT],
            'project_id' => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $result = $this->repo->searchMember($request);
        return $this->respond($result->toArray(), [], 'admin.pages.payee.member_search');
    }

    public function memberDetails(Request $request, int $memberId)
    {
        $emiRepo          = new EMIRepository();
        $accountRepo      = new AccountRepository();
        $user             = $this->repo->getById($request, $memberId);
        $role             = Acl::decodeRole($user->acl);
        $otpCount         = $emiRepo->getOtpCount($request, $memberId);
        $emiCount         = $emiRepo->getPaidCount($request, $memberId);
        $transactionCount = $accountRepo->getTransactionByUser($request, $memberId);
        $users            = $this->repo->getUsersByProjectId($request, $request->user()->project_id);
        $emiList          = EMIRepository::emiListWithOutPagination();
        return $this->respond(compact('user', 'otpCount', 'emiCount', 'transactionCount', 'role', 'users', 'emiList'), [], 'admin.pages.profile.member'); // Todo ; View
    }

    /**
     * @throws UserFriendlyException
     */
    public function showByUserType(Request $request, string $userType)
    {
        if (!Roles::search(strtoupper($userType))) {
            throw new UserFriendlyException(Errors::VALIDATION_FAILED, ResponseType::UNPROCESSABLE_ENTITY);
        }

        $users        = $this->repo->getByType($request, $userType);
        $emiRepo      = new EMIRepository();
        $newUsersData = [];

        foreach ($users as $user) {
            $user->emiDue   = $emiRepo->getEmiDueByUserAndEmiType($request, $user->id);
            $user->otpDue   = $emiRepo->getEmiDueByUserAndEmiType($request, $user->id, true);
            $newUsersData[] = $user;
        }

        return $this->respond($newUsersData, [], 'admin.pages.payee.memberType');
    }
}
