<?php


namespace Helper\Calculator;


use App\Models\Account as Model;
use Helper\Constants\Transaction;
use Helper\Repo\AccountRepository;
use Helper\Repo\PayeeRepository;
use Helper\Repo\UserRepository;
use Helper\Transform\Objects;
use Helper\Transform\PhotoMod;
use Illuminate\Http\Request;

final class Account implements Calculator
{
    private Request           $request;
    private Model             $oldRecord;
    private Model             $newRecord;
    private AccountRepository $repo;
    private UserRepository    $userRepo;
    private PayeeRepository   $payeeRepo;
    private int               $amount;
    public int                $payee_id;
    public int                $emi_id;
    public int                $total;
    public int                $due;
    public int                $required;
    public int                $credit;
    public int                $debit;
    public string             $type;
    public string             $comment;
    public ?string            $image;
    public int                $is_fund;
    public int                $by_user;
    public int                $user_id;
    public int                $project_id;

    final private function __construct(Request $request)
    {
        $this->request    = $request;
        $this->newRecord  = new Model();
        $this->repo       = new AccountRepository();
        $this->user_id    = $request->user()->id;
        $this->project_id = $request->user()->project_id;
        $this->oldRecord  = $this->getLastRecord();
        return $this;
    }

    private function getLastRecord(): Model
    {
        $lastRecord = $this->repo->getLatestRecord($this->project_id);
        if (empty($lastRecord)) {
            $account             = new Model();
            $account->total      = 0;
            $account->due        = 0;
            $account->required   = 0;
            $account->credit     = 0;
            $account->debit      = 0;
            $account->type       = Transaction::CREDIT;
            $account->is_fund    = false;
            $account->user_id    = $this->user_id;
            $account->project_id = $this->project_id;
            $this->repo->save($account);
            return $account;
        }
        return $lastRecord;
    }

    public static function credit(Request $request, int $amount = 0, string $image = null, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->userRepo = new UserRepository();
        $instance->type     = Transaction::CREDIT;
        $instance->is_fund  = false;
        $instance->amount   = $request->input('amount') ?? $amount;
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->credit   = $instance->amount;
        $instance->image    = PhotoMod::resizeAndUpload($request);
        $instance->total    = (float)$instance->oldRecord->total + $instance->amount;
        $instance->due      = (float)$instance->oldRecord->due - $instance->amount;
        $instance->required = $instance->negativeChecker((float)$instance->oldRecord->required - $instance->amount);
        $instance->updateUserData($instance, Transaction::CREDIT);
        $instance->assignAndSave($instance);
        return $instance;
    }

    private function debitUserOnHoldAmount(Account $instance): void
    {
        $user          = $instance->userRepo->getById($instance->request, $instance->user_id);
        $user->on_hold -= $instance->credit;
        $instance->userRepo->save($user);
    }

    public static function fund(Request $request, int $amount, int $emi_id, int $by_user, string $image = null, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->userRepo = new UserRepository();
        $instance->emi_id   = $emi_id;
        $instance->type     = Transaction::EMI;
        $instance->is_fund  = true;
        $instance->amount   = $request->input('amount') ?? $amount;
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->image    = PhotoMod::resizeAndUpload($request);
        $instance->total    = (float)$instance->oldRecord->total;
        $instance->required = (float)$instance->oldRecord->required;
        $instance->due      = (float)$instance->oldRecord->due + $instance->amount;
        $instance->by_user  = (int)$by_user;
        $instance->updateUserData($instance, Transaction::EMI);
        $instance->assignAndSave($instance);
        return $instance;
    }

    private function creditUserOnHoldAmount(Account $instance): void
    {
        $user          = $instance->userRepo->getById($instance->request, $instance->user_id);
        $user->on_hold += $instance->amount;
        $instance->userRepo->save($user);
    }

    private function updateUsersDueAndContribution(Account $instance): void
    {
        $user               = $instance->userRepo->getById($instance->request, $instance->by_user);
        $user->due          -= $instance->due;
        $user->contribution += $instance->amount;
        $instance->userRepo->save($user);
    }

    private function updateUserData(Account $instance, string $type): void
    {
        switch ($type) {
            case Transaction::EMI:
                $this->creditUserOnHoldAmount($instance);
                $this->updateUsersDueAndContribution($instance);
                break;
            case Transaction::CREDIT:
                $this->debitUserOnHoldAmount($instance);
        }
    }

    public static function debit(Request $request, int $amount, int $payeeId, string $comment = '', string $image = null): Account
    {
        $instance            = new Account($request);
        $instance->payeeRepo = new PayeeRepository();
        $instance->type      = Transaction::DEBIT;
        $instance->is_fund   = false;
        $instance->payee_id  = $payeeId;
        $instance->amount    = $request->input('amount') ?? $amount;
        $instance->comment   = $request->input('comment') ?? $comment;
        $instance->debit     = $instance->amount;
        $instance->image     = PhotoMod::resizeAndUpload($request);
        $instance->due       = (float)$instance->oldRecord->due;
        $instance->total     = (float)$instance->oldRecord->total - $instance->amount;
        $instance->required  = (float)$instance->oldRecord->required;
        $instance->updatePayeeData($instance);
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function demand(Request $request, int $amount, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->type     = Transaction::CREDIT;
        $instance->is_fund  = false;
        $instance->amount   = $request->input('amount') ?? $amount;
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->due      = (float)$instance->oldRecord->due;
        $instance->total    = (float)$instance->oldRecord->total;
        $instance->required = (float)$instance->amount;
        $instance->assignAndSave($instance);
        return $instance;
    }

    private function updatePayeeData(Account $instance): void
    {
        $payee       = $instance->payeeRepo->getById($instance->request, $instance->payee_id);
        $payee->paid += $instance->amount;
        $instance->payeeRepo->save($payee);
    }

    private function assignAndSave(Account $instance): void
    {
        $account = new Model();
        foreach (Objects::toArray($instance) as $key => $value) {
            $account->{$key} = $value;
        }
        $instance->repo->save($account);
    }

    public function toArray(): array
    {
        return Objects::toArray($this);
    }

    private function negativeChecker(int $amount): int
    {
        if ($amount < 0) {
            return 0;
        }
        return $amount;
    }
}