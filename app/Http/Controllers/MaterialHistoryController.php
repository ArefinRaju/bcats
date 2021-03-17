<?php


namespace App\Http\Controllers;

use App\Models\MaterialHistory;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\MaterialHistoryRepository;

class MaterialHistoryController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $repo;

    public function __construct(MaterialHistoryRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(MaterialHistory::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    //public function
}