<?php


namespace Helper\Core;

use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\Messages;
use Helper\Constants\ResponseType;
use Helper\Transform\Arrays;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    /**
     * @param  object|array  $data
     * @param  array  $errors
     * @param  string  $view
     * @param  string  $message
     * @param  int  $statusCode
     * @param  array  $headers
     * @param  array  $paginationParams
     * @return Application|Factory|JsonResponse|View
     */

    public function respond($data = [], array $errors = [], string $view = 'admin.dashboard', string $message = Messages::OK, int $statusCode = ResponseType::OK, array $headers = [], array $paginationParams = [])
    {
        if (self::isAPI()) {
            if (!is_array($data)) {
                $data = $data->toArray();
            }
            return self::generateResponse($data, $errors, $message, $this->version, $statusCode, $headers, $paginationParams);
        } elseif (!empty($errors)) {
            return view('admin.dashboard')->withErrors($errors);
        }
        return view($view)->with('data', $data);
    }


    public static function generateResponse(
        $data = null,
        $errors = null,
        string $message = Messages::OK,
        int $version = 1,
        int $statusCode = ResponseType::OK,
        array $headers = [],
        $paginationParams = []
    ): JsonResponse {
        $response = [
            'errors'    => $errors ?: new stdClass(),
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

    /**
     * @param  Request  $request
     * @param  array  $rules
     * @param  Model  $model
     * @param  mixed  ...$blockUpdate
     * @return object
     * @throws UserFriendlyException
     */

    public function validateCherryPickAndAssign(Request $request, array $rules, Model $model, ...$blockUpdate): object
    {
        $input = $this->validateCherryPick($request, $rules);
        return $this->assignAfterCherryPick($model, $input, ...$blockUpdate);
    }

    /**
     * @param  Request  $request
     * @param  array  $rules
     * @return array
     * @throws UserFriendlyException
     */

    public function validateCherryPick(Request $request, array $rules): array
    {
        $this->validate($request, $rules);
        return $this->cherryPick($request, $rules);
    }

    /**
     * @param  Request  $request
     * @param  array  $rules
     * @return bool
     * @throws UserFriendlyException
     */

    public function validate(Request $request, array $rules): bool
    {
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            if (self::isAPI()) {
                throw new UserFriendlyException($this->getSerializedValidationError($validation), ResponseType::UNPROCESSABLE_ENTITY, $validation->errors()->messages());
            }
            $request->validate($rules);
        }
        return true;
    }

    private function getSerializedValidationError(object $validation): string
    {
        $out = '';
        foreach ($validation->errors()->toArray() as $value) {
            $out = "$out $value[0]";
        }
        return $out;
    }

    public static function isAPI(): bool
    {
        if (Request()->header('content-type') === 'application/json' || explode('/', request()->path())[0] === 'api') {
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
            } elseif (gettype($validationRule) === 'array' and array_search('boolean', $validationRule, true) !== false) {
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

    /**
     * @param  Request  $request
     * @return object
     * @throws UserFriendlyException
     */

    public function paginationManager(Request $request): object
    {
        $rules              = [
            'per_page' => [V::SOMETIMES, V::REQUIRED, V::INTEGER],
            'page'     => [V::SOMETIMES, V::REQUIRED, V::INTEGER]
        ];
        $inputs             = $this->validateCherryPick($request, $rules);
        $inputs['per_page'] = $inputs['per_page'] ?? null;
        $inputs['page']     = $inputs['page'] ?? null;
        return Arrays::toObject($inputs);
    }

    // Basic controller methods

    public function validation(): array
    {
        return $this->commonValidationRules;
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @throws UserFriendlyException
     */

    public function retrieve(Request $request, int $id)
    {
        throw new NotSupportedException();
    }

    /**
     * @param  Request  $request
     * @throws UserFriendlyException
     */

    public function list(Request $request)
    {
        throw new NotSupportedException();
    }

    /**
     * @param  Request  $request
     * @throws UserFriendlyException
     */

    public function create(Request $request)
    {
        throw new NotSupportedException();
    }

    /**
     * @param  Request  $request
     * @param  string  $id
     * @throws UserFriendlyException
     */

    public function update(Request $request, string $id)
    {
        throw new NotSupportedException();
    }

    /**
     * @param  Request  $request
     * @param  string  $id
     * @throws UserFriendlyException
     */

    public function destroy(Request $request, string $id)
    {
        throw new NotSupportedException();
    }

    /**
     * @throws UserFriendlyException
     */
    public static function Error(string $errors){
        if (HelperController::isAPI()) {
            throw new UserFriendlyException($errors);
        }
        return redirect(url()->previous())->withErrors($errors);
    }
}
