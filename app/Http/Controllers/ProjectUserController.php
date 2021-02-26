<?php


namespace App\Http\Controllers;


use App\Models\ProjectUser;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\ProjectUserRepository;

class ProjectUserController extends HelperController
{
    protected array               $commonValidationRules;
    private ProjectUserRepository $repo;

    public function __construct(ProjectUserRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(ProjectUser::class);
        $this->commonValidationRules = [
            'role' => [V::SOMETIMES, V::REQUIRED, V::TEXT]
        ];
    }
}