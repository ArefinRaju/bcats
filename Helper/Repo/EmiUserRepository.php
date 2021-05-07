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
                      ->first();
    }
}