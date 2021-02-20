<?php

namespace App\Http\Controllers;

use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Transform\Objects;
use Illuminate\Http\Request;

class ProductController extends HelperController
{
    protected array $commonValidationRules;

    public function __construct()
    {
        $this->commonValidationRules = [
            'ids'  => V::NUMBER,
            'idss' => V::NUMBER
        ];
        //$this->setResource(Model here);
    }

    public function retrieve(Request $request, string $id = '')
    {
        //dd($request->header('Authorization'));
        $token = str_replace('Bearer ', '', $request->header('Authorization'));
        dd($token);
        $rules = $this->commonValidationRules;
        $model = $this->validateCherryPickAndAssign($request, $rules, new \stdClass());
        // $this->repo->saveOrFail($model);
        return $this->respond(Objects::toArray($model), [], Messages::OK, ResponseType::CREATED);
    }
}
