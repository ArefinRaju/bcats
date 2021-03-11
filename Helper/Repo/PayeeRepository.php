<?php


namespace Helper\Repo;


use App\Models\Payee;
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
}