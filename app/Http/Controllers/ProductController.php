<?php

namespace App\Http\Controllers;

use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
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



    public function retrieve(Request $request, string $id, string $action = null)
    {
        //dd($request->header('Authorization'));
        $token = str_replace('Bearer ', '', $request->header('Authorization'));
        //dd($token);
        $encoded = base64_encode('ADMIN');
        $decode = base64_decode('QURNSU4=');
        //dd($decode);

        $request->acl = 'QURNSU4=';
        Acl::authorize($request, Permission::CREATE_MANAGER);
        dd(true);


        $rules = $this->commonValidationRules;
        $model = $this->validateCherryPickAndAssign($request, $rules, new \stdClass());
        // $this->repo->saveOrFail($model);
        return $this->respond(Objects::toArray($model), [], Messages::OK, ResponseType::CREATED);
    }
}
