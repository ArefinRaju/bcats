<?php


namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Helper\ACL\Acl;
use Helper\ACL\Roles;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ProjectStatus;
use Helper\Constants\ProjectType;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Repo\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function createForm()
    {
        $data = [
            'projectType' => ProjectType::toArray(),
            'status'      => ProjectStatus::toArray()
        ];
        return view('admin.pages.project.create', $data);
    }

    public function editForm(Request $request, int $id)
    {
        $project = $this->repo->getById($request, $id);
        return view('admin.pages.project.edit', compact('project'));
    }

    public function create(Request $request, string $action = null)
    {
        $project = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Project());
        $project = $this->repo->save($project);
        $this->createProjectUser($project);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $projects   = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.project.index')->with('data', $projects);
        }
        return $this->respond($project, [], 'admin.pages.project.index');
    }

    public function createProjectUser(object $project): void
    {
        $user             = new User();
        $user->name       = $project->name.' Admin';
        $user->password   = Hash::make('123456');
        $user->mobile     = '01748986541';
        $user->email      = strtolower(str_replace(' ', '-', $user->name)).'@bcats.net';
        $user->acl        = Acl::createUserRole(Roles::PROJECT_ADMIN);
        $user->project_id = $project->id;
        $user->save();
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $Projects   = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($Projects, [], 'admin.pages.project.index');
    }

    public function update(Request $request, string $id = null)
    {
        $project = $this->repo->getById($request, $id);
        $project = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $project);
        $this->repo->save($project);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $projects   = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.project.index')->with('data', $projects);
        }
        return $this->respond($project, []);
    }

    public function destroy(Request $request, string $id)
    {
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $projects   = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.project.index')->with('data', $projects);
        }
        return $this->respond(null, [], 'admin.pages.project.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}