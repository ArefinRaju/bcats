<?php


namespace App\Http\Controllers;


use App\Models\Emi;
use App\Models\EmiUser;
use App\Models\Project;
use App\Models\User;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\CRUD;
use Helper\Constants\Errors;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\EMIRepository;
use Helper\Repo\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EMIController extends HelperController
{
    protected array        $commonValidationRules;
    private EMIRepository  $repo;
    private UserRepository $userRepo;

    public function __construct(EMIRepository $repo, UserRepository $userRepo)
    {
        $this->repo     = $repo;
        $this->userRepo = $userRepo;
        $this->setResource(Emi::class);
        $this->commonValidationRules = [
            "name"  => [V::REQUIRED, V::TEXT],
            "value" => [V::REQUIRED, V::INTEGER],
            "date"  => [V::REQUIRED, V::DATE],
            "otp"   => [V::SOMETIMES, V::BOOLEAN]
        ];
    }


    public function createForm()
    {
        $users    = User::all();
        $projects = Project::all();
        return view('admin.pages.emi.create', compact('users', 'projects'));
    }

    public function create(Request $request, string $action = null)
    {
        $emi             = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Emi());
        $emi->project_id = $request->user()->project_id;
        $emi             = $this->repo->save($emi);
        $users           = $this->userRepo->getUsersByProjectId($request, $request->user()->project_id);
        foreach ($users as $user) {
            $emiUser             = new EmiUser();
            $emiUser->emi_id     = $emi->id;
            $emiUser->project_id = $request->user()->project_id;
            $emiUser->user_id    = $user->id;
            $emiUser->save();
        }
        $this->emiInit($request, $users, CRUD::CREATE);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $emis       = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.emi.index')->with('data', $emis);
        }
        return $this->respond($emi, [], 'admin.pages.emi.index');
    }

    public function retrieve(Request $request, int $id)
    {
        $emi = $this->repo->getById($request, $id);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $emis       = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($emis, [], 'admin.pages.emi.index');
    }

    public function update(Request $request, string $id = null)
    {
        $emi         = $this->repo->getById($request, $id);
        $emiOldValue = (float)$emi->value; // Old value stored for calculation
        $emi         = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $emi);
        $users       = $this->userRepo->getUsersByProjectId($request, $request->user()->project_id);
        $this->emiInit($request, $users, CRUD::UPDATE, $emiOldValue);
        $this->repo->save($emi);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function destroy(Request $request, string $id)
    {
        return $this->respond(null, [Errors::FORBIDDEN]);
    }

    private function emiInit(Request $request, Collection $users, string $CRUDType, int $emiOldValue = 0)
    {
        switch ($CRUDType) {
            case CRUD::CREATE:
                foreach ($users as $user) {
                    $user->due = (float)$user->due + $request->input('value');
                    $this->userRepo->save($user);
                }
                break;
            case CRUD::UPDATE:
                foreach ($users as $user) {
                    $userBaseDue = (float)$user->due - $emiOldValue;
                    $user->due   = $userBaseDue + $request->input('value');
                    $this->userRepo->save($user);
                }
                break;
        }
    }

    /**
     * @throws UserFriendlyException
     */
    public function unpaidEMIs(Request $request)
    {
        $this->validate($request, ['userId' => [V::REQUIRED, V::ID]]);
    }
}