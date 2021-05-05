<?php


namespace Helper\Repo;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Category::class);
    }

    public function list()
    {
        return Category::get();
    }

    public function getById(Request $request, int $id)
    {
        return Category::where('id', $id)->first();
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Category::destroy($id);
    }

    public function materialList(Request $request)
    {
        return Category::all();
    }

    public function isExist(Request $request): bool
    {
        return Category::where('name', $request->input('name'))->exists();
    }
}