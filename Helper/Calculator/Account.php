<?php


namespace Helper\Calculator;


use App\Models\Account as Model;
use App\Models\Payee;
use App\Models\User;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\ACL\Roles;
use Helper\Constants\Errors;
use Helper\Constants\PayeeType;
use Helper\Constants\ResponseType;
use Helper\Constants\Transaction;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\EMIRepository;
use Helper\Repo\EmiUserRepository;
use Helper\Repo\InvoiceRepository;
use Helper\Repo\PayeeRepository;
use Helper\Repo\UserRepository;
use Helper\Transform\Objects;
use Helper\Transform\PhotoMod;
use Illuminate\Http\Request;

final class Account implements Calculator
{
    private Request           $request;
    private Model             $oldRecord;
    private AccountRepository $repo;
    private UserRepository    $userRepo;
    private PayeeRepository   $payeeRepo;
    private int               $amount;
    public int                $payee_id;
    public int                $emi_id;
    public int                $total;
    public int                $due;
    public ?int               $employee;
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
    public int                $invoice_id;

    final private function __construct(Request $request)
    {
        $this->request    = $request;
        $this->repo       = new AccountRepository();
        $this->userRepo   = new UserRepository();
        $this->user_id    = $request->user()->id;
        $this->project_id = $request->user()->project_id;
        $this->oldRecord  = $this->getLastRecord($request);
        return $this;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function credit(Request $request, int $amount, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->type     = Transaction::CREDIT;
        $instance->is_fund  = false;
        $instance->amount   = $instance->negativeChecker($amount);
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->credit   = $instance->amount;
        $instance->image    = PhotoMod::resizeAndUpload($request);
        $instance->total    = $instance->oldRecord->total + $instance->amount;
        $instance->due      = $instance->oldRecord->due - $instance->amount;
        $instance->employee = $instance->oldRecord->employee;
        $instance->required = $instance->negativeChecker($instance->oldRecord->required - $instance->amount);
        $instance->updateUserData($instance, Transaction::CREDIT);
        $instance->assignAndSave($instance);
        return $instance;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function fund(Request $request, int $amount, int $emi_id, int $by_user, string $comment = ''): Account
    {
        $instance          = new Account($request);
        $instance->emi_id  = $emi_id;
        $instance->type    = Transaction::EMI;
        $instance->amount  = $instance->negativeChecker($amount);
        $instance->comment = $request->input('comment') ?? $comment;

        if (Acl::isAuthorized($request, Permission::PAY_BILLS)) {
            $instance->is_fund = false;
            $instance->total   = $instance->oldRecord->total + $instance->amount;
            $instance->due     = $instance->oldRecord->due;
            $instance->credit  = $instance->amount;
        } else {
            $instance->is_fund = true;
            $instance->total   = $instance->oldRecord->total;
            $instance->due     = $instance->oldRecord->due + $instance->amount;
        }

        $instance->required = $instance->oldRecord->required;
        $instance->employee = $instance->oldRecord->employee;
        $instance->by_user  = $by_user;
        $instance->updateUserEmi($request, $amount, $emi_id, $by_user);
        $instance->image = PhotoMod::resizeAndUpload($request);
        $instance->updateUserData($instance, Transaction::EMI);
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function demand(Request $request, int $amount, string $comment = ''): Account
    {
        $instance           = new Account($request);
        $instance->type     = Transaction::CREDIT;
        $instance->is_fund  = false;
        $instance->amount   = $instance->negativeChecker($amount);
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->due      = $instance->oldRecord->due;
        $instance->employee = $instance->oldRecord->employee;
        $instance->total    = $instance->oldRecord->total;
        $instance->required = $instance->amount;
        $instance->assignAndSave($instance);
        return $instance;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function payPayee(Request $request, int $amount, int $payeeId, string $comment = '', ?int $invoiceId = null): Account
    {
        $instance            = new Account($request);
        $instance->payeeRepo = new PayeeRepository();
        $payee               = $instance->payeeRepo->getById($instance->request, $payeeId);
        if (!$payee->status) {
            throw new UserFriendlyException(Errors::FORBIDDEN);
        }
        $instance->type     = Transaction::DEBIT;
        $instance->is_fund  = false;
        $instance->payee_id = $payeeId;
        $instance->amount   = $instance->negativeChecker($amount);
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->debit    = $instance->amount;
        $instance->due      = $instance->oldRecord->due;
        if ($instance->isUserType($instance, Roles::EMPLOYEE, $request->user()->id)) {
            $instance->total    = $instance->oldRecord->total;
            $instance->employee = $instance->oldRecord->employee - $amount;
            $instance->updateEmployeeData($instance, Transaction::DEBIT);
        } else {
            $instance->employee = $instance->oldRecord->employee;
            $instance->total    = $instance->oldRecord->total - $instance->amount;
        }
        $instance->required = $instance->oldRecord->required;
        $instance->image    = PhotoMod::resizeAndUpload($request);
        if (!empty($invoiceId)) {
            $instance->invoice_id = $invoiceId;
        }
        $instance->updatePayeeData($instance, $payee);
        $instance->assignAndSave($instance);
        return $instance;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function payEmployee(Request $request, int $amount, int $employee, string $comment = ''): Account
    {
        $instance = new Account($request);
        $instance->validateUserType($instance, Roles::EMPLOYEE, $employee);
        $instance->validateUserType($instance, Roles::PROJECT_ADMIN, $request->user()->id);
        $instance->type     = Transaction::DEBIT;
        $instance->is_fund  = false;
        $instance->amount   = $instance->negativeChecker($amount);
        $instance->debit    = $instance->amount;
        $instance->due      = $instance->oldRecord->due;
        $instance->employee = $instance->oldRecord->employee + $amount;
        $instance->total    = $instance->oldRecord->total - $instance->amount;
        $instance->required = $instance->oldRecord->required;
        $instance->by_user  = $employee;
        $instance->comment  = $request->input('comment') ?? $comment;
        $instance->image    = PhotoMod::resizeAndUpload($request);
        // Todo : Update EMPLOYEE on hold amount
        $instance->updateEmployeeData($instance, Transaction::CREDIT);
        $instance->assignAndSave($instance);
        return $instance;
    }

    private function getLastRecord(Request $request): Model
    {
        $lastRecord = $this->repo->getLatestRecord($this->project_id);
        if (empty($lastRecord)) {
            return $this->repo->createTransaction($request, 0, $this->project_id);
        }
        return $lastRecord;
    }

    /**
     * @throws UserFriendlyException
     */
    private function updateUserEmi(Request $request, int $amount, int $emi_id, int $by_user): void
    {
        $emi     = (new EMIRepository())->getById($request, $emi_id);
        $userEmi = (new EmiUserRepository())->getUnpaidByEmiIdAndUserId($request, $emi->id, $by_user);
        if (empty($userEmi)) {
            throw new UserFriendlyException(Errors::EMI_PAID);
        }
        $dueLeft = $userEmi->due - $amount;
        if ($dueLeft < 0) {
            throw new UserFriendlyException(Errors::AMOUNT_IS_BIGGER_THAN_DUE);
        }
        $userEmi->due  = $dueLeft;
        $userEmi->paid += $amount;
        if ($dueLeft > 0) {
            $userEmi->status = false;
        } else {
            $userEmi->status = true;
        }
        $userEmi->save();
    }

    /**
     * @throws UserFriendlyException
     */
    private function creditUserOnHoldAmount(Account $instance): void
    {
        if ($instance->isUserType($instance, Roles::EMPLOYEE, $instance->by_user)) {
            /** @var $user User */
            $user               = $instance->userRepo->getByIdAndProject($instance->request, $instance->by_user);
            $user->contribution += $instance->amount;
        } else {
            $user = $instance->userRepo->getByIdAndProject($instance->request, $instance->user_id);
        }
        $user->on_hold += $instance->amount;
        $instance->userRepo->save($user);
    }

    /**
     * @throws UserFriendlyException
     */
    private function debitUserOnHoldAmount(Account $instance): void
    {
        $user = $instance->isUserType($instance, Roles::EMPLOYEE, $instance->request->user()->id);
        if ($user) {
            $user->on_hold -= $instance->amount;
        } else {
            $user          = $instance->userRepo->getByIdAndProject($instance->request, $instance->user_id);
            $user->on_hold -= $instance->credit;
        }
        $instance->userRepo->save($user);
    }

    private function updateUsersDueAndContribution(Account $instance): void
    {
        /* @var User $user */
        $user               = $instance->userRepo->getByIdAndProject($instance->request, $instance->by_user);
        $user->due          -= $instance->amount;
        $user->contribution += $instance->amount;
        $instance->userRepo->save($user);
    }

    /**
     * @throws UserFriendlyException
     */
    private function updateUserData(Account $instance, string $type): void
    {
        switch ($type) {
            case Transaction::EMI:
                if (!Acl::isAuthorized($instance->request, Permission::PAY_BILLS)) {
                    $this->creditUserOnHoldAmount($instance);
                }
                $this->updateUsersDueAndContribution($instance);
                break;
            case Transaction::CREDIT:
                $this->debitUserOnHoldAmount($instance);
        }
    }

    /**
     * @throws UserFriendlyException
     */
    private function updateEmployeeData(Account $instance, string $transactionType): void
    {
        switch ($transactionType) {
            case Transaction::CREDIT:
                $this->creditUserOnHoldAmount($instance);
                break;
            case Transaction::DEBIT:
                $this->debitUserOnHoldAmount($instance);
                break;
            default:
                throw new UserFriendlyException(Errors::ACTION_NOT_SUPPORTED);
        }
    }

    /**
     * @throws UserFriendlyException
     */
    private function validateUserType(Account $instance, string $role, int $userId): void
    {
        if (!$instance->isUserType($instance, $role, $userId)) {
            throw new UserFriendlyException(Errors::FORBIDDEN);
        }
    }

    /**
     * @throws UserFriendlyException
     */
    private function isUserType(Account $instance, string $role, int $userId)
    {
        /** @var $user User */
        $user = $instance->userRepo->getByIdAndProject($instance->request, $userId);
        if (!$user) {
            throw new UserFriendlyException("Wrong Employee", ResponseType::FORBIDDEN);
        }
        $userRole = Acl::decodeRole($user->acl);
        if ($userRole === $role) {
            return $user;
        }
        return false;
    }

    private function updatePayeeData(Account $instance, Payee $payee): void
    {
        if ($payee->type === PayeeType::SUPPLIER) {
            if (!empty($instance->invoice_id)) {
                $due        = $instance->request->input('amount') - $instance->amount;
                $payee->due += $due;
            } else {
                $payee->due -= $instance->amount;
            }
        }
        $payee->paid += $instance->amount;
        self::completeInvoice();
        $instance->payeeRepo->save($payee);
    }

    private function completeInvoice(): void
    {
        $amount   = $this->request->input('amount');
        $invoices = (new InvoiceRepository())->payeeList($this->request);
        foreach ($invoices as $invoice) {
            if ($amount <= 0) {
                break;
            } elseif ($amount < $invoice->due) {
                $invoice->due = $invoice->due - $amount;
                $invoice->save();
                break;
            }
            $amount          -= $invoice->due;
            $invoice->due    = 0;
            $invoice->status = true;
            $invoice->save();
        }
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
