<?php


namespace Helper\Repo;


use App\Models\Payee;
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
        return Payee::where('project_id', $request->user()->project_id);
    }
}
