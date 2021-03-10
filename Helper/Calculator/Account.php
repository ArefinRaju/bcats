<?php


namespace Helper\Calculator;


use App\Models\Account as Model;
use Helper\Constants\Transaction;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Illuminate\Http\Request;

final class Account implements Calculator
{
    private Request $request;
    private Model   $oldRecord;
    private Model   $newRecord;
    public int      $payee_id;
    public int      $emi_id;
    public int      $total;
    public int      $due;
    public int      $required;
    public int      $credit;
    public int      $debit;
    public string   $type;
    public string   $comment;
    public ?string  $image;
    public int      $is_fund;
    public int      $by_user;
    public int      $user_id;
    public int      $project_id;

    final private function __construct(Request $request)
    {
        $this->request    = $request;
        $this->newRecord  = new Model();
        $this->user_id    = $request->user()->id;
        $this->project_id = $request->user()->project_id;
        $this->oldRecord  = $this->getLastRecord();
        return $this;
    }

    private function getLastRecord(): Model
    {
        $repo = new AccountRepository();
        return $repo->getLatestRecord($this->project_id);
    }

    /**
     * @param  Request  $request
     * @param  bool  $is_fund
     * @param  int  $amount
     * @param  int  $emi_id
     * @param  int|null  $by_user
     * @param  string|null  $image
     * @param  string  $comment
     * @return object
     * @throws UserFriendlyException
     */
    public static function credit(Request $request, bool $is_fund, int $amount, int $emi_id, int $by_user = null, string $image = null, string $comment = ''): object
    {
        $account          = new Account($request);
        $account->emi_id  = $emi_id;
        $account->type    = Transaction::CREDIT;
        $account->comment = $comment;
        $account->image   = $image;
        $account->isFund($account, $is_fund, $amount, $by_user);
        // Todo : Convert it to model and save
        return $account;
    }

    /**
     * @param  Account  $account
     * @param  bool  $is_fund
     * @param  int  $amount
     * @param  int|null  $by_user
     * @throws UserFriendlyException
     */
    private function isFund(Account $account, bool $is_fund, int $amount, ?int $by_user): void
    {
        if ($is_fund && $by_user) {
            $account->total    = $account->oldRecord->total;
            $account->required = $account->oldRecord->required;
            $account->due      = $account->oldRecord->due + $amount;
            $account->by_user  = $by_user;
            // Todo : Add it to user's due
        }
        elseif (!$is_fund) {
            $account->total    = $account->oldRecord->total + $amount;
            $account->required = $account->oldRecord->required - $amount;
            $account->by_user  = $account->user_id;
            // Todo : Remove from user's due
        }
        else {
            throw new UserFriendlyException('Development Error');
        }
    }

    public function debit()
    {
        // TODO: Implement debit() method.
    }
}