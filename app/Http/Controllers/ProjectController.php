<?php


namespace App\Http\Controllers;

use App\Models\Project;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\ProjectRepository;
use Illuminate\Http\Request;

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
        return view('admin.pages.project.create');
    }
    public function editForm($id)
    {
        $project = Project::find($id);
        return view('admin.pages.project.edit', compact('project'));
    }
    public function create(Request $request, string $action = null)
    {
        $project = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Project());
        $this->repo->save($project);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $projects     = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.project.index')->with('data', $projects);
        }
        return $this->respond($project, [], 'admin.pages.project.index');
    }
    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $Projects  = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($Projects, [], 'admin.pages.project.index');
    }
    public function update(Request $request, string $id = null)
    {
        $project = $this->repo->getById($request, $id);
        $project = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $project);
        $this->repo->save($project);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $projects  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.project.index')->with('data', $projects);
        }
        return $this->respond($project, []);
    }
    public function destroy(Request $request, string $id)
    {

     //   dd($id);
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $payees  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.payee.index')->with('data', $payees);
        }
        return $this->respond(null, [], 'admin.pages.project.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}