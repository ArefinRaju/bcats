<?php


namespace App\Http\Controllers;

use App\Models\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Enum;
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

        return view('admin.pages.material.create');
    }
    public function materialList()
    {
        $materials = Material::all();
        return view('admin.pages.material.index', compact('materials'));
    }
    public function create(Request $request, string $action = null)
    {
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Material());
        $this->repo->save($material);
        return $this->respond($material->toArray(), [], 'admin.pages.material.index');
    }

    public function update(Request $request, string $id = null)
    {
        $material = $this->repo->getById($request, $id);
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $material);
        $this->repo->save($material);
        return $this->respond($material->toArray(), [], 'admin.dashboard');
    }
}
