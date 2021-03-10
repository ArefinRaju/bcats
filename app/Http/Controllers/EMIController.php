<?php


namespace App\Http\Controllers;


use App\Models\EMIs;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Repo\EMIRepository;
use Illuminate\Http\Request;

class EMIController extends HelperController
{
    protected array       $commonValidationRules;
    private EMIRepository $repo;

    public function __construct(EMIRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Emis::class);
        $this->commonValidationRules = [
            "user_id"    => [V::REQUIRED, V::INTEGER],
            "value"      => [V::REQUIRED, V::INTEGER],
            "status"     => [V::REQUIRED, V::TEXT],
            "date"       => [V::REQUIRED, V::DATE],
            "project_id" => [V::REQUIRED, V::INTEGER],
        ];
    }

    public function create(Request $request, string $action = null)
    {
        $emi = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new EMIs());
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
        return $this->respond($emi, [], 'bladeFile');
    }

    public function update(Request $request, string $id = null)
    {
        $emi = $this->repo->getById($request, $id);
        $emi = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $emi);
        $this->repo->save($emi);
        return $this->respond($emi, [], 'bladeFile');
    }

    public function destroy(Request $request, string $id)
    {
        $this->repo->destroyById($id);
        return $this->respond(null, [], 'bladeFile', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}