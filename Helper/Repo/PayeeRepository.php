<?php


namespace Helper\Repo;


use App\Models\Payee;
use App\Models\User;
use Helper\ACL\Acl;
use Helper\Constants\PayeeType;
use Illuminate\Http\Request;

class PayeeRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Payee::class);
    }

    public function getById(Request $request, int $id)
    {
        return Payee::where('id', $id)->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Payee::orderBy('name', 'asc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function supplierList()
    {
        return Payee::where('type', PayeeType::SUPPLIER)->get();
    }

    /**
     * @param  string  $id
     * @return bool
     */
    public function destroyById(string $id): bool
    {
        return Payee::destroy($id);
    }

    public function payeeList(Request $request)
    {
        return Payee::where('project_id', $request->user()->project_id)->get(['id', 'name']);
    }
    public function emoloyeeList(Request $request)
    {
        return User::where('acl',Acl::createUserRole(strtoupper('employee')))->where('project_id', $request->user()->project_id)->get(['id', 'name']);
    }

    public function getSupplier(Request $request, int $id)
    {
        return Payee::leftJoin('invoices', 'payees.id', '=', 'invoices.payee_id')
                    ->select('payees.*')
                    ->where('payees.id', $id)
                    ->where('payees.type', PayeeType::SUPPLIER)
                    ->where('payees.project_id', $request->user()->project_id)
                    ->get();
    }

    public function isExist(Request $request): bool
    {
        return Payee::where('name', $request->input('name'))
                    ->where('type', $request->input('type'))
                    ->where('project_id', $request->user()->project_id)
                    ->exists();
    }

    public function update(Request $request)
    {
        $amount      = $request->input('amount');
        $paidAmount  = $request->input('paidAmount');
        $due         = $amount - $paidAmount;
        $payee       = self::getById($request, $request->input('payeeId'));
        $payee->paid += $paidAmount;
        $payee->due  += $due;
        return $this->save($payee);
    }

    public function searchSupplier(Request $request)
    {
        return Payee::where(function ($query) {
            $query->where('name', 'like', '%'.Request()->input('query').'%')
                  ->orWhere('mobile', 'like', '%'.Request()->input('query').'%')
                  ->orWhere('address', 'like', '%'.Request()->input('query').'%');
        })
                    ->where('type', PayeeType::SUPPLIER)
                    ->where('project_id', $request->input('project_id'))
                    ->get();
    }

    public function getByType($request,$supplierType)
    {
        return Payee::where('type',$supplierType)->where('project_id',$request->user()->project_id)->get();
    }
}
