<?php


namespace App\Http\Controllers;


use App\Models\ProjectUser;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\CategoryRepository;

class CategoryController extends HelperController
{
    protected array            $commonValidationRules;
    private CategoryRepository $repo;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(ProjectUser::class);
        $this->commonValidationRules = [
            'role' => [V::SOMETIMES, V::REQUIRED, V::TEXT]
        ];
    }
}