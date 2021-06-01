<?php


namespace Helper\Repo;


use App\Models\Emi;
use DB;
use Illuminate\Http\Request;

class EMIRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Emi::class);
    }

    public function getById(Request $request, int $id)
    {
        return Emi::where('id', $id)
                  ->where('project_id', Request()->user()->project_id)
                  ->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Emi::where('project_id', Request()->user()->project_id)
                  ->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Emi::destroy($id);
    }

    public function getByUserId(Request $request, int $userId)
    {
        return Emi::where('user_id', $userId)
                  ->where('project_id', Request()->user()->project_id)
                  ->get();
    }

    public function getOtpCount(Request $request, int $userId)
    {
        return Emi::join('emi_users', 'emis.id', '=', 'emi_users.emi_id')
                  ->where('emi_users.user_id', $userId)
                  ->where('emi_users.status', 1)
                  ->where('emis.otp', 1)
                  ->count();
    }

    public function getPaidCount(Request $request, int $userId)
    {
        return DB::table('emi_users')
                 ->where('user_id', $userId)
                 ->where('status', 1)
                 ->count();
    }
}