<?php


namespace App\Http\Controllers;

use App\Models\MaterialHistory;
use Helper\Calculator\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\MaterialHistoryRepository;
use Illuminate\Http\Request;

class MaterialHistoryController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $repo;

    public function __construct(MaterialHistoryRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(MaterialHistory::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function credit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER],
            'payeeId'    => [V::REQUIRED, V::NUMBER],
        ];
        $this->validate($request, $rules);
        $log = Material::credit($request, $request->input('materialId'), $request->input('amount'), $request->input('payeeId'));
        return $this->respond($log, [], '');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function debit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Material::debit($request, $request->input('materialId'), $request->input('amount'));
        return $this->respond($log, [], '');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function demand(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Material::demand($request, $request->input('materialId'), $request->input('amount'));
        return $this->respond($log, [], '');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function stock(Request $request)
    {
        $log = Material::demand($request, $request->input('materialId'), $request->input('amount'));
        return $this->respond($log, [], ''); // Todo : Stock Management
    }
}