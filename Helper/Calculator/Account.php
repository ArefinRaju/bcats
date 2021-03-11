<?php


namespace Helper\Calculator;


use App\Models\Account as Model;
use Helper\Constants\Transaction;
use Helper\Core\UserFriendlyException;
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
        $instance          = new Account($request);
        $instance->emi_id  = $emi_id;
        $instance->type    = Transaction::CREDIT;
        $instance->comment = $comment;
        $instance->image   = $image;
        $instance->isFund($instance, $is_fund, $amount, $by_user);
        // Todo : Convert it to model and save
        return $instance;
    }

    /**
     * @param  Account  $instance
     * @param  bool  $is_fund
     * @param  int  $amount
     * @param  int|null  $by_user
     * @throws UserFriendlyException
     */
    private function isFund(Account $instance, bool $is_fund, int $amount, ?int $by_user): void
    {
        if ($is_fund && $by_user) {
            $instance->total    = (float)$instance->oldRecord->total;
            $instance->required = (float)$instance->oldRecord->required;
            $instance->due      = (float)$instance->oldRecord->due + $amount;
            $instance->by_user  = (int)$by_user;
            $this->updateUserData($instance, Transaction::CREDIT);
            // Todo : Add it to user's due
        }
        elseif (!$is_fund) {
            $instance->total    = (float)$instance->oldRecord->total + $amount;
            $instance->required = (float)$instance->oldRecord->required - $amount;
            $instance->by_user  = (int)$instance->user_id;
            // Todo : Remove from user's due
        }
        else {
            throw new UserFriendlyException('Development Error');
        }
    }

    private function userDue()
    {
        // Todo : Get user data
    }

    private function updateUserData(Account $instance, string $type)
    {
        $byUser = $instance->userRepo->getById($instance->request, $instance->by_user);
        $user   = $instance->userRepo->getById($instance->request, $instance->user_id);
        switch ($type) {
            case Transaction::CREDIT:
                $byUser->due = $byUser->due - $instance->due;
                $user->due   = $user->due + $instance->due;
                $instance->assignAndSave($instance);
                $instance->userRepo->save($byUser);
                $instance->userRepo->save($user);
                break;
            case Transaction::DEBIT:
        }
    }

    private function assignAndSave(Account $instance)
    {
        dd(Objects::toArray($instance));
    }

    public function debit()
    {
        // TODO: Implement debit() method.
    }
}