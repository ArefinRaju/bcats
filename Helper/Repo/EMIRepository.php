<?php


namespace Helper\Repo;


use App\Models\Emis;
use Illuminate\Http\Request;

class EMIRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Emis::class);
    }

    public function getById(Request $request, int $id)
    {
        return Emis::where('id', $id)->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Emis::where('project_id', Request()->user()->project_id)->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Emis::destroy($id);
    }
}