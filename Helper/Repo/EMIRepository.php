<?php


namespace Helper\Repo;


use App\Models\EMIs;
use Illuminate\Http\Request;

class EMIRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(EMIs::class);
    }

    public function getById(Request $request, int $id)
    {
        return EMIs::where('id', $id)->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return EMIs::orderBy('name', 'asc')->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return EMIs::destroy($id);
    }
}