<?php


namespace App\Http\Controllers;


use App\Models\Account as Model;
use Helper\Calculator\Account;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\AccountRepository;
use Helper\Transform\Objects;
use Illuminate\Http\Request;

class AccountController extends HelperController
{
    protected array           $commonValidationRules;
    private AccountRepository $repo;

    public function __construct(AccountRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Model::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    public function create(Request $request)
    {
        //Account::fund($request, 20, 1, 3);
        //Account::credit($request, 200);
        //Account::debit($request, 100, 1);
        //dd(Objects::toArray(Account::debit($request, 25, 1)));
    }
}