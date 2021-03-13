<?php


namespace App\Http\Controllers;


use App\Models\EMIs;
use App\Models\User;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\CRUD;
use Helper\Constants\Errors;
use Helper\Core\HelperController;
use Helper\Repo\EMIRepository;
use Helper\Repo\UserRepository;
use Illuminate\Http\Request;

class EMIController extends HelperController
{
    protected array        $commonValidationRules;
    private EMIRepository  $repo;
    private UserRepository $userRepo;

    public function __construct(EMIRepository $repo, UserRepository $userRepo)
    {
        $this->repo     = $repo;
        $this->userRepo = $userRepo;
        $this->setResource(Emis::class);
        $this->commonValidationRules = [
            "user_id"    => [V::REQUIRED, V::INTEGER],
            "value"      => [V::REQUIRED, V::INTEGER],
            "status"     => [V::REQUIRED, V::TEXT],
            "date"       => [V::REQUIRED, V::DATE],
            "project_id" => [V::REQUIRED, V::INTEGER],
        ];
    }


    public function createForm()
    {
        $users = User::all();
        return view('admin.pages.emi.create',compact('users'));
    }
    public function create(Request $request, string $action = null)
    {
        $emi = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new EMIs());
        $this->emiInit($request, (float)$emi->value, $emi->project_id, CRUD::CREATE);
        $this->repo->save($emi);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function retrieve(Request $request, string $id)
    {
        $emi = $this->repo->getById($request, $id);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $emi        = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($emi, [], 'admin.pages.emi.index');
    }

    public function update(Request $request, string $id = null)
    {
        $emi          = $this->repo->getById($request, $id);
        $emiOldAmount = (float)$emi->value; // Old value stored for calculation
        $emi          = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $emi);
        $this->emiInit($request, (float)$emi->value, $emi->project_id, CRUD::UPDATE, $emiOldAmount);
        $this->repo->save($emi);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function destroy(Request $request, string $id)
    {
        return $this->respond(null, [Errors::FORBIDDEN]);
    }

    private function emiInit(Request $request, int $amount, int $projectId, string $CRUDType, int $emiOldAmount = 0)
    {
        $users = $this->userRepo->getUsersByProjectId($request, $projectId);
        switch ($CRUDType) {
            case CRUD::CREATE:
                foreach ($users as $user) {
                    $user->due = (float)$user->due + $amount;
                    $this->userRepo->save($user);
                }
                break;
            case CRUD::UPDATE:
                foreach ($users as $user) {
                    $userBaseDue = (float)$user->due - $emiOldAmount;
                    $user->due   = $userBaseDue + $amount;
                    $this->userRepo->save($user);
                }
                break;
        }
    }
}