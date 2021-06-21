<?php


namespace Helper\Repo;

use App\Models\EmiUser;
use App\Models\User;
use Helper\ACL\Acl;
use Helper\Transform\Arrays;
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

    public function getByIdAndProject(Request $request, int $id)
    {
        return User::where('id', $id)
            ->where('project_id', $request->user()->project_id)
            ->first();
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

    public function searchMember(Request $request): Collection
    {
        return User::where(function ($query) {
            $query->where('name', 'like', '%' . Request()->input('query') . '%')
                ->orWhere('mobile', 'like', '%' . Request()->input('query') . '%')
                ->orWhere('email', 'like', '%' . Request()->input('query') . '%');
        })
            ->where('project_id', $request->input('project_id'))
            ->get();
    }

    public function getByType(Request $request, string $userType): array
    {
        $encryptedData = Acl::createUserRole(strtoupper($userType));

        $users = User::all();


        foreach ($users as $item) {
            $list['name'] = $item->name;
            $list['phone'] = $item->mobiles;
            $list['email'] = $item->email;
            $list['emiDue'] = $this->getMemberEmiDue($request, $item->id);
            $list['otpDue'] = $this->getMemberOtpDue($request, $item->id);
        }
        return $list;
    }

    private function getMemberEmiDue($request, $memberId)
    {
        return EmiUser::leftJoin('emis', 'emi_users.emi_id', 'emis.id')->where('emis.otp', 0)->where('emi_users.user_id', $memberId)->sum('due');
    }
    private function getMemberOtpDue($request, $memberId)
    {
        return EmiUser::leftJoin('emis', 'emi_users.emi_id', 'emis.id')->where('emis.otp', 1)->where('emi_users.user_id', $memberId)->sum('due');
    }
}
