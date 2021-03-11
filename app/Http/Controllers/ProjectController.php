<?php


namespace App\Http\Controllers;

use App\Models\Project;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\ProjectRepository;

class ProjectController extends HelperController
{
    protected array           $commonValidationRules;
    private ProjectRepository $repo;

    public function __construct(ProjectRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Project::class);
        $this->commonValidationRules = [
            'name'     => [V::REQUIRED, V::TEXT],
            'type'     => [V::REQUIRED, V::TEXT],
            'budget'   => [V::REQUIRED, V::NUMBER],
            'deadline' => [V::REQUIRED, V::DATE],
            'status'   => [V::REQUIRED, V::TEXT],
        ];
    }
}