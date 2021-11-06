<?php


namespace Helper\Repo;


use App\Models\Emi;
use App\Models\EmiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function listByType(Request $request, bool $otp = false)
    {
        return Emi::where('project_id', Request()->user()->project_id)
                  ->where('otp', $otp)
                  ->get();
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

    public function otpEmiTransactionList(Request $request, $memberId, bool $isOtp)
    {
        return EmiUser::join('accounts', 'accounts.emi_id', 'emi_users.emi_id')
                      ->where('emi_users.otp', $isOtp)
                      ->where('accounts.by_user', $memberId)
                      ->where('emi_users.user_id', $memberId)
                      ->get();
    }

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

    public function getAllEmiDueByUserAndEmiType(Request $request, bool $otp = false): float
    {
        return (float)Emi::Join('emi_users', 'emis.id', '=', 'emi_users.emi_id')
                         ->where('emi_users.status', 0)
                         ->where('emis.otp', $otp)
                         ->where('emis.project_id', $request->user()->project_id)
                         ->sum('emi_users.due');
    }
}
