<?php


namespace App\Http\Controllers;


use App\Models\Account as Model;
use Helper\Calculator\Account;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
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

        dd($request->all());
        //Account::fund($request, 20, 1, 3);
      //  Account::debit($request, $request->amount, $request->payee_id,1);
        //Account::credit($request, 200);
        //Account::debit($request, 100, 1);
        //dd(Objects::toArray(Account::debit($request, 25, 1)));
    }


    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function payPayee(Request $request)
    {
        $rules = [
            'payeeId' => [V::REQUIRED, V::NUMBER],
            'amount'  => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Account::debit($request, $request->input('amount'), $request->input('payeeId'));
        return $this->respond($log, [], '');
    }
}