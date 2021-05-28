<?php


namespace App\Http\Controllers;


use App\Models\ProjectUser;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends HelperController
{
    protected array           $commonValidationRules;
    private InvoiceRepository $repo;

    public function __construct(InvoiceRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(ProjectUser::class);
        $this->commonValidationRules = [
            'role' => [V::SOMETIMES, V::REQUIRED, V::TEXT]
        ];
    }

    /**
     * @throws UserFriendlyException
     */
    public function listByPayee(Request $request, int $payee_id)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->listByPayee($request, $payee_id, $pagination->per_page, $pagination->page);
        return $this->respond($materials, [], 'viewHere'); // Todo : View
    }
}