<?php


namespace Helper\Repo;


use App\Models\Invoice;

class InvoiceRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Invoice::class);
    }
}