<?php


namespace Helper\Core;


use App\Exceptions\Handler;
use Exception;
use Helper\Constants\Errors;
use Helper\Constants\ResponseType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class CustomExceptionHandler extends Handler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Exception $e
     * @return void
     * @throws Exception|\Throwable
     */
    public function report($e)
    {
        parent::report($e);
    }

    public function render($request, $e)
    {
        // This means the env supports disclosing errors via Developer Exception Pages. Well, OK boi.
        if (Environment::shouldDiscloseErrors()) {
            return parent::render($request, $e);
        }

        $returnCode = $e->getCode() != 0 ? $e->getCode() : 400;
        $message    = $e->getMessage();

        // This does not seem used, commented for now.
        $data = method_exists($e, 'getData') ? $e->getData() : '';

        $version = $this->extractVersionFromRequest($request);

        // Production error rendering.
        // List of errors we have custom handlers for.
        switch (true) {
            case $e instanceof AuthorizationException:
                return HelperController::generateResponse(null, [Errors::UNAUTHORIZED => null], Errors::REQUEST_FAILED, $version, ResponseType::FORBIDDEN);
                break;

            // Stops the super silly errors on string IDs being given.
            case $e instanceof FatalError:
                if (!strpos($message, 'must be of type integer, string given') && !strpos($message, 'Controller')) {
                    break;
                }
                $message = [Errors::FATAL_THROWABLE_ERROR => $e->getOriginalClassName()];
                return HelperController::generateResponse(null, $message, Errors::REQUEST_FAILED, $version, $returnCode);
            case $e instanceof UserFriendlyException:
                //This is an error we can actually disclose to the user

                return HelperController::generateResponse(null, [$message => $data], Errors::REQUEST_FAILED, $version, $returnCode);
                break;

            case $e instanceof ValidationException:
                $parsedErrors = [];
                foreach ($e->errors() as $field => $messages) {
                    foreach ($messages as $message) {
                        $parsedErrors[] = $message;
                    }
                }

                return HelperController::generateResponse(null, [Errors::VALIDATION_FAILED => $parsedErrors], Errors::REQUEST_FAILED, $version, ResponseType::UNPROCESSABLE_ENTITY);
                break;
            case $e instanceof MethodNotAllowedException:
                return HelperController::generateResponse(null, [Errors::METHOD_NOT_ALLOWED => $request->getMethod()], Errors::REQUEST_FAILED, $version, ResponseType::METHOD_NOT_ALLOWED);
                break;

            case $e instanceof NotFoundHttpException:
                return HelperController::generateResponse(null, [Errors::ENDPOINT_NOT_FOUND => $request->getPathInfo()], Errors::REQUEST_FAILED, $version, ResponseType::NOT_FOUND);
                break;

            case $e instanceof ModelNotFoundException:
                return HelperController::generateResponse(
                    null,
                    [
                        Errors::RESOURCE_NOT_FOUND => [
                            $e->getModel()
                        ]
                    ],
                    Errors::REQUEST_FAILED,
                    $version,
                    ResponseType::NOT_FOUND
                );
                break;
            case $e instanceof NotSupportedException:
                return HelperController::generateResponse(null, [Errors::ACTION_NOT_SUPPORTED => null], Errors::REQUEST_FAILED, $version, ResponseType::BAD_REQUEST);
                break;
        }

        // For everything else, something grave has gone wrong. The error should NOT be disclosed to the user, but logged as a part of the handle() routine.
        return Utility::generateResponse(null, [Errors::SOMETHING_WENT_WRONG => null], Errors::REQUEST_FAILED, $version, ResponseType::INTERNAL_SERVER_ERROR);
    }

    private function extractVersionFromRequest(Request $request): int
    {
        return 1;
        // TODO: extract version number properly later
//        $matchedRoute = $request->route();
//
//        if (isset($matchedRoute[1]['uses']))
//        {
//            list ($controller, $method) = explode('@', $matchedRoute[1]['uses']);
//            if (class_exists($controller))
//            {
//                $controller = new $controller();
//                if (is_object($controller) && property_exists($controller, 'version'))
//                {
//                    // TODO: stop abusing reflection for no reason and simply return this in the payload
//                    $version = $controller->version;
//                }
//            }
//        }
//
    }
}