<?php


namespace Helper\Repo;


use App\Models\Project;
use Illuminate\Http\Request;

class ProjectRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Project::class);
    }

    public function getById(Request $request, int $id)
    {
        return Project::where('id', $id)->first();
    }
    public function list(int $perPage = null, int $page = null)
    {
        return Project::orderBy('name', 'asc')->paginate($perPage, ['*'], 'page', $page);
    }
    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Project::destroy($id);
    }
}