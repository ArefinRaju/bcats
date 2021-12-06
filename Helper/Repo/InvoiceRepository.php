<?php


namespace Helper\Repo;


use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Invoice::class);
    }

    public function create(Request $request): Invoice
    {
        $payeeId                = $request->input('payeeId');
        $materialId             = $request->input('materialId');
        $payeeName              = (new PayeeRepository())->getById($request, $payeeId)->name;
        $materialName           = (new MaterialRepository())->getById($request, $materialId)->name;
        $amount                 = $request->input('amount');
        $paidAmount             = $request->input('paidAmount');
        $due                    = $amount - $paidAmount;
        $invoice                = new Invoice();
        $invoice->payee_id      = $payeeId;
        $invoice->payee_name    = $payeeName;
        $invoice->material_id   = $materialId;
        $invoice->material_name = $materialName;
        $invoice->quantity      = $request->input('quantity');
        $invoice->project_id    = $request->user()->project_id;
        $invoice->paid          = $paidAmount;
        $invoice->due           = $due;
        return $this->save($invoice);
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Invoice::where('project_id', Request()->user()->project_id)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage, ['*'], 'page', $page);
    }

    public function payeeList(Request $request)
    {
        return Invoice::where('payee_id', $request->input('payeeId'))
                      ->whereNull('status')
                      ->where('project_id', $request->user()->project_id)
                      ->orderBy('id', 'asc')
                      ->get();
    }

    public function listByPayee(Request $request, int $id, ?int $perPage = 10, ?int $page = null)
    {
        return Invoice::where('payee_id', $id)
                      ->where('project_id', $request->user()->project_id)
                      ->orderBy('id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }
}
