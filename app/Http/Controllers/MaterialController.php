<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Enum;
use Helper\Constants\Errors;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\MaterialRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialController extends HelperController
{
    protected array            $commonValidationRules;
    private MaterialRepository $repo;

    public function __construct(MaterialRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Material::class);
        $this->commonValidationRules = [
            'name'        => [V::REQUIRED, V::TEXT],
            'enum'        => [V::REQUIRED, V::TEXT, Rule::in(Enum::values())],
            'category_id' => [V::REQUIRED, V::INTEGER],
            'is_labor'    => [V::REQUIRED, V::BOOLEAN]
        ];
    }

    public function validation(): array
    {
        $rules = $this->commonValidationRules;
        unset($rules['enum'][2]);
        $validation    = $rules['enum'];
        $rules['enum'] = [
            'rules' => $validation,
            'enums' => Enum::values()
        ];
        return $rules;
    }

    public function constants()
    {
        $result = [];
        foreach (Enum::values() as $enum) {
            $result[] = ['name' => $enum];
        }
        return $this->respond($result);
    }

    public function createForm()
    {
        $data         = Enum::toArray();
        $categoryList = Category::all();
        return view('admin.pages.material.create', compact('data', 'categoryList'));
    }

    public function editForm($id)
    {
        $material     = Material::find($id);
        $data         = Enum::toArray();
        $categoryList = Category::all();
        return view('admin.pages.material.edit', compact('data', 'material', 'categoryList'));
    }

    public function create(Request $request, string $action = null)
    {
        if ($this->repo->isExist($request)) {
            return $this->respond([], [Errors::DATA_EXIST], '', ResponseType::UNPROCESSABLE_ENTITY);
        }
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Material());
        $this->repo->save($material);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.material.index')->with('data', $materials);
        }
        return $this->respond($material, [], 'admin.pages.material.index');
    }

    public function retrieve(Request $request, int $id)
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

    public function listByCategoryId(Request $request, int $id)
    {
        $materials = $this->repo->listByCategoryId($request, $id);
        return $this->respond($materials, [], ''/*Todo*/);
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
        throw new UserFriendlyException(Errors::FORBIDDEN);
        /*$this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $materials  = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.material.index')->with('data', $materials);
        }
        return $this->respond(null, [], 'admin.pages.material.index', Messages::DESTROYED, ResponseType::NO_CONTENT);*/
    }
}
