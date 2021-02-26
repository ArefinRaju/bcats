<?php


namespace App\Http\Controllers;


use App\Models\Account;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\AccountRepository;

class AccountController extends HelperController
{
    protected array           $commonValidationRules;
    private AccountRepository $repo;

    public function __construct(AccountRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Account::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }
}