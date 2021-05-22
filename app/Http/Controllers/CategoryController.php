<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\ProjectUser;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends HelperController
{
    protected array            $commonValidationRules;
    private CategoryRepository $repo;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(ProjectUser::class);
        $this->commonValidationRules = [
            'name' => [V::REQUIRED, V::TEXT]
        ];
    }
    public function createForm()
    {
        return view('admin.pages.category.create');
    }
    public function editForm($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.edit', compact('category'));
    }
    public function create(Request $request, string $action = null)
    {
        if ($this->repo->isExist($request)) {
            return $this->respond([], [Errors::DATA_EXIST], '', ResponseType::UNPROCESSABLE_ENTITY);
        }
        $category = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Category());
        $this->repo->save($category);
        if (!self::isAPI()) {
            $categories = $this->repo->list();
            return view('admin.pages.category.index')->with('data', $categories);
        }
        return $this->respond($category, [], 'admin.pages.category.index');
    }

    public function retrieve(Request $request, int $id)
    {
        $category = $this->repo->getById($request, $id);
        return $this->respond($category, []);
    }

    public function list(Request $request)
    {
        $materials = $this->repo->list();
        return $this->respond($materials, [], 'admin.pages.category.index');
    }

    public function update(Request $request, string $id = null)
    {
        $category = $this->repo->getById($request, $id);
        $category = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $category);
        $this->repo->save($category);
        if (!self::isAPI()) {
            $categories = $this->repo->list();
            return view('admin.pages.category.index')->with('data', $categories);
        }
        return $this->respond($category, []);
    }

    public function destroy(Request $request, string $id)
    {
        throw new UserFriendlyException(Errors::FORBIDDEN);
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $categories = $this->repo->list();
            //return view('')->with('data', $categories); // Todo
        }
        return $this->respond(null, [], ''/* Todo */, Messages::DESTROYED, ResponseType::NO_CONTENT);
    }
}
