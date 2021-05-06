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
        $amount               = $request->input('amount');
        $paidAmount           = $request->input('paidAmount');
        $due                  = $amount - $paidAmount;
        $invoice              = new Invoice();
        $invoice->payee_id    = $request->input('payeeId');
        $invoice->material_id = $request->input('materialId');
        $invoice->quantity    = $request->input('quantity');
        $invoice->project_id  = $request->user()->project_id;
        $invoice->paid        = $paidAmount;
        $invoice->due         = $due;
        return $this->save($invoice);
    }

    public function payeeList(Request $request)
    {
        return Invoice::where('payee_id', $request->input('payeeId'))
                      ->whereNull('status')
                      ->where('project_id', $request->user()->project_id)
                      ->orderBy('id', 'asc')
                      ->get();
    }
}