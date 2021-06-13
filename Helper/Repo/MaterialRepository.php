<?php


namespace Helper\Repo;


use App\Models\Material;
use Illuminate\Http\Request;

class MaterialRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Material::class);
    }

    public function getById(Request $request, int $id)
    {
        return Material::where('id', $id)->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Material::orderBy('name', 'asc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function listByCategoryId(Request $request, int $id)
    {
        return Material::where('category_id', $id)->get();
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Material::destroy($id);
    }

    public function materialList(Request $request)
    {
        return Material::leftJoin('material_histories','material_histories.material_id','materials.id')->get();
    }

    public function isExist(Request $request): bool
    {
        return Material::where('name', $request->input('name'))->exists();
    }
}
