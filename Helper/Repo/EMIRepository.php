<?php


namespace Helper\Repo;


use App\Models\Emi;
use App\Models\EmiUser;
use Helper\Calculator\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account As AccountModel;

class EMIRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Emi::class);
    }

    public function getById(Request $request, int $id)
    {
        return Emi::where('id', $id)
                  ->where('project_id', $request->user()->project_id)
                  ->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Emi::where('project_id', Request()->user()->project_id)
                  ->paginate($perPage, ['*'], 'page', $page);
    }

    public function emiListWithOutPagination(Request $request)
    {
        return Emi::where('project_id', $request->user()->project_id)
                  ->where('otp', 0)
                  ->get();
    }

    public function otpListWithOutPagination(Request $request)
    {
        return Emi::where('project_id', $request->user()->project_id)
                  ->where('otp', 1)
                  ->get();
    }

    public function otpTransectionList(Request $request,$memberId)
    {

        return EmiUser::leftJoin('accounts','accounts.emi_id','emi_users.emi_id')
            ->where('emi_users.otp',1)
            ->where('accounts.user_id',$memberId)->get();
    }

    public function emiTransectionList(Request $request,$memberId)
    {
        return AccountModel::leftJoin('emi_users','accounts.emi_id','emi_users.emi_id')
            ->where('emi_users.otp',0)
            ->where('accounts.user_id',$memberId)->get();
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
                  ->where('project_id', $request->user()->project_id)
                  ->get();
    }

    public function getPaidCount(Request $request, int $userId): int
    {
        return DB::table('emi_users')
                 ->where('user_id', $userId)
                 ->where('status', 1)
                 ->count();
    }

    public function getEmiDueByUserAndEmiType(Request $request, int $userId, bool $otp = false): float
    {
        return (float)Emi::join('emi_users', 'emis.id', '=', 'emi_users.emi_id')
                         ->where('emi_users.user_id', $userId)
                         ->where('emi_users.status', 0)
                         ->where('emis.otp', $otp)
                         ->sum('emi_users.due');
    }
}
