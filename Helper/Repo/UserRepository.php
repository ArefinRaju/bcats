<?php


namespace Helper\Repo;


use App\Models\User;
use Helper\Constants\CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(User::class);
    }

    public function getById(Request $request, int $id)
    {
        return User::where('id', $id)->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return User::orderBy('name', 'asc')->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return User::destroy($id);
    }

    public function firstOrNewByEmail(string $email)
    {
        return User::query()->firstOrNew(['email' => $email]);
    }

    public function findByEmail(string $email)
    {
        return User::where(['email' => $email])->First();
    }

    public function getUsersByProjectId(Request $request, int $projectId): Collection
    {
        return User::where('project_id', $projectId)->get();
    }
}