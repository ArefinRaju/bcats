<?php


namespace Helper\Core;

use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use stdClass;

class HelperController extends Controller
{
    public int       $version = 1;
    protected string $resource;
    protected string $rawResource;
    protected array  $commonValidationRules;

    public function validation(): array
    {
        return $this->commonValidationRules;
    }

    public function respond(
        $data = null,
        array $errors = [],
        string $message = Messages::OK,
        int $statusCode = ResponseType::OK,
        array $headers = [],
        array $paginationParams = []
    ): JsonResponse
    {
        return self::generateResponse($data, $errors, $message, $this->version, $statusCode, $headers, $paginationParams);
    }


    public static function generateResponse(
        $data = null,
        $errors = null,
        string $message = Messages::OK,
        int $version = 1,
        int $statusCode = ResponseType::OK,
        array $headers = [],
        $paginationParams = []
    ): JsonResponse
    {
        $response = [
            'errors'    => $errors ? $errors : new stdClass(),
            'result'    => $data,
            'message'   => $message,
            'version'   => $version,
            'timestamp' => time()
        ];

        if (!empty($paginationParams)) {
            $response['pagination'] = $paginationParams;
        }
        return response()->json($response, $statusCode, $headers, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    public function validateCherryPickAndAssign(Request $request, $rules, $model, ...$blockUpdate): object
    {
        $this->validate($request, $rules);
        $input = $this->cherryPick($request, $rules);
        //$input = $request->toArray();
        $model = $this->assignAfterCherryPick($model, $input, ...$blockUpdate);
        return $model;
    }

    public function validate(Request $request, array $rules)
    {
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            if (self::isAPI($request)){
                throw new UserFriendlyException(Messages::VALIDATION_FAILED, ResponseType::UNPROCESSABLE_ENTITY, $validation->errors()->messages());
            }
            return back()->withErrors($validation->errors());
        }
        return true;
    }

    public function isAPI(Request $request): bool
    {
        if ($request->header('content-type') === 'application/json'){
            return true;
        }
        return false;
    }

    public function cherryPick(Request $request, array $validationRules): array
    {
        $validationRulesKeys = array_keys($validationRules);
        foreach ($validationRulesKeys as $key => $validationRulesKey) {
            if (substr($validationRulesKey, -1) === '*') {
                unset($validationRulesKeys[$key]);
            }
        }
        $result = $request->only($validationRulesKeys);
        // replace 1/"1"/0/"0" with TRUE/FALSE for all requests coming from front-end based on validation rule
        foreach ($validationRules as $key => $validationRule) {
            if (gettype($validationRule) === 'string' and strpos($validationRule, 'boolean') !== false) {
                settype($result[$key], 'boolean');
            }
            elseif (gettype($validationRule) === 'array' and array_search('boolean', $validationRule, true) !== false) {
                settype($result[$key], 'boolean');
            }
        }
        return $result;
    }

    public function assignAfterCherryPick($model, $input, ...$blockUpdate): object
    {
        foreach ($input as $prop => $value) {
            if (in_array($prop, $blockUpdate, true)) {
                continue; // dont allow update
            }
            $model->{$prop} = $value;
        }
        return $model;
    }

    protected function setResource(string $resource)
    {
        $this->rawResource = $resource;
        $this->resource    = class_basename($resource);
    }
}
