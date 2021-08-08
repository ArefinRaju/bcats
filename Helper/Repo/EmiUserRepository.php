<?php


namespace Helper\Repo;


use App\Models\EmiUser;
use Illuminate\Http\Request;

class EmiUserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(EmiUser::class);
    }

    public function getById(Request $request, int $id)
    {
        return EmiUser::where('id', $id)->first();
    }

    public function getUnpaidByEmiIdAndUserId(Request $request, int $id, int $userId)
    {
        return EmiUser::where('emi_id', $id)
                      ->where('user_id', $userId)
                      ->where('status', 0)
                      ->where('project_id',$request->user()->project_id)
                      ->first();
    }

    public function getEmiByEmiTypeAndStatus(Request $request, int $userId, bool $otp)
    {
        return EmiUser::where('user_id', $userId)
                        ->where('otp', $otp)
                        ->where('project_id',$request->user()->project_id)
                        ->get();
    }
}
