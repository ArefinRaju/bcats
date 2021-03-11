<?php


namespace Helper\Calculator;


use App\Models\Account as Model;
use Helper\Constants\Transaction;
use Helper\Repo\AccountRepository;
use Helper\Repo\UserRepository;
use Helper\Transform\Objects;
use Illuminate\Http\Request;

final class Account implements Calculator
{
    private Request           $request;
    private Model             $oldRecord;
    private Model             $newRecord;
    private AccountRepository $repo;
    private UserRepository    $userRepo;
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
        $this->userRepo   = new UserRepository();
        $this->user_id    = $request->user()->id;
        $this->project_id = $request->user()->project_id;
        $this->oldRecord  = $this->getLastRecord();
        return $this;
    }

    private function getLastRecord(): Model
    {
        return $this->repo->getLatestRecord($this->project_id);
    }

    public static function credit(Request $request, int $amount, string $image = null, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->type     = Transaction::CREDIT;
        $instance->is_fund  = false;
        $instance->amount   = $amount;
        $instance->comment  = $comment;
        $instance->credit   = $instance->amount;
        $instance->image    = $image; // Todo : Job > Upload image
        $instance->total    = (float)$instance->oldRecord->total + $instance->amount;
        $instance->required = (float)$instance->oldRecord->required - $instance->amount;
        $instance->updateUserData($instance, Transaction::CREDIT);
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function fund(Request $request, int $amount, int $emi_id, int $by_user, string $image = null, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->emi_id   = $emi_id;
        $instance->type     = Transaction::EMI;
        $instance->is_fund  = true;
        $instance->comment  = $comment;
        $instance->amount   = $amount;
        $instance->image    = $image; // Todo : Job > Upload image
        $instance->total    = (float)$instance->oldRecord->total;
        $instance->required = (float)$instance->oldRecord->required;
        $instance->due      = (float)$instance->oldRecord->due + $instance->amount;
        $instance->by_user  = (int)$by_user;
        $instance->updateUserData($instance, Transaction::EMI);
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function debit()
    {
        // TODO: Implement debit() method.
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

    private function creditUserOnHoldAmount(Account $instance): void
    {
        $user          = $instance->userRepo->getById($instance->request, $instance->user_id);
        $user->on_hold = $user->on_hold + $instance->amount;
        $instance->userRepo->save($user);
    }

    private function updateUsersDueAndContribution(Account $instance): void
    {
        $user               = $instance->userRepo->getById($instance->request, $instance->by_user);
        $user->due          = $user->due - $instance->due;
        $user->contribution = $user->contribution + $instance->amount;
        $instance->userRepo->save($user);
    }

    private function debitUserOnHoldAmount(Account $instance): void
    {
        $user          = $instance->userRepo->getById($instance->request, $instance->user_id);
        $user->on_hold = $user->on_hold - $instance->credit;
        $instance->userRepo->save($user);
    }

    public function toArray(): array
    {
        return Objects::toArray($this);
    }

    private function assignAndSave(Account $instance): void
    {
        $account = new Model();
        foreach (Objects::toArray($instance) as $key => $value) {
            $account->{$key} = $value;
        }
        $instance->repo->save($account);
    }
}