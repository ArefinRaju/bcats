<?php


namespace App\Http\Controllers;

use App\Models\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Enum;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Repo\MaterialHistoryRepository;
use Helper\Repo\MaterialRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $materialHistoryRepo;
    private MaterialRepository        $repo;

    public function __construct(MaterialRepository $repo, MaterialHistoryRepository $materialHistoryRepo)
    {
        $this->repo                = $repo;
        $this->materialHistoryRepo = $materialHistoryRepo;
        $this->setResource(Material::class);
        $this->commonValidationRules = [
            'name' => [V::REQUIRED, V::TEXT],
            'enum' => [V::REQUIRED, V::TEXT, Rule::in(Enum::values())],
        ];
    }

    public function createForm()
    {
        $enumList = Enum::toArray();
        return view('admin.pages.material.create')->with('data', $enumList);
    }
    public function editForm($id)
    {
        $material=Material::find($id);
        $data = Enum::toArray();
        return view('admin.pages.material.edit',compact('data','material'));
    }

    public function create(Request $request, string $action = null)
    {
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Material());
        $this->repo->save($material);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.material.index')->with('data', $materials);
        }
        return $this->respond($material, [], 'admin.pages.material.index');
    }

    public function retrieve(Request $request, string $id)
    {
        $material = $this->repo->getById($request, $id);
        return $this->respond($material, []);
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($materials, [], 'admin.pages.material.index');
    }

    public function update(Request $request, string $id = null)
    {
        $material = $this->repo->getById($request, $id);
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $material);
        $this->repo->save($material);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.material.index')->with('data', $materials);
        }
        return $this->respond($material, []);
    }

    public function destroy(Request $request, string $id)
    {

     //   dd($id);
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.material.index')->with('data', $materials);
        }
        return $this->respond(null, [], 'admin.pages.material.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}
