<?php


namespace App\Http\Controllers;

use App\Models\Payee;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\PayeeRepository;

class PayeeController extends HelperController
{
    protected array         $commonValidationRules;
    private PayeeRepository $repo;

    public function __construct(PayeeRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Payee::class);
        $this->commonValidationRules = [
            'name'    => [V::REQUIRED, V::TEXT],
            'address' => [V::REQUIRED, V::TEXT],
            'mobile'  => [V::REQUIRED, V::PHONE],
            'paid'    => [V::REQUIRED, V::NUMBER],
            'type'    => [V::REQUIRED, V::TEXT],
        ];
    }
}