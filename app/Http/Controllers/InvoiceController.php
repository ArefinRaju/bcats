<?php


namespace App\Http\Controllers;


use App\Models\ProjectUser;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\InvoiceRepository;

class InvoiceController extends HelperController
{
    protected array               $commonValidationRules;
    private InvoiceRepository $repo;

    public function __construct(InvoiceRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(ProjectUser::class);
        $this->commonValidationRules = [
            'role' => [V::SOMETIMES, V::REQUIRED, V::TEXT]
        ];
    }
}