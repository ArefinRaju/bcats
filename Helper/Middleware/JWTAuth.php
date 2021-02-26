<?php


namespace Helper\Middleware;

use Closure;
use Helper\Constants\Errors;
use Helper\Constants\JWTTokenStatus;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\JWT;
use Helper\Transform\Strings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Lcobucci\JWT\Token;

class JWTAuth
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return JsonResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return HelperController::generateResponse(null, [Errors::AUTHENTICATION_FAILED => Errors::AUTHENTICATION_TOKEN_MISSING], Errors::UNAUTHORIZED, 1, ResponseType::NOT_AUTHORIZED);
        }
        if (!Strings::hasPrefix($token, 'Bearer ')) {
            return HelperController::generateResponse(null, [Errors::AUTHENTICATION_FAILED => Errors::AUTHENTICATION_TOKEN_MALFORMED], Errors::UNAUTHORIZED, 1, ResponseType::NOT_AUTHORIZED);
        }

        /** @var Token $token */
        /** @var JWTTokenStatus $status */
        [$status, $token] = JWT::validate(Strings::trimHeader($token, 'Bearer '));

        $error = Errors::AUTHENTICATION_FAILED;
        switch ($status) {
            case JWTTokenStatus::EXPIRED:
                $error = Errors::AUTHENTICATION_TOKEN_EXPIRED;
                break;

            case JWTTokenStatus::INVALID:
                $error = Errors::AUTHENTICATION_TOKEN_INVALID;
                break;

            case JWTTokenStatus::OK:
                $error = null;
                break;

            default:
                Log::warning("Unknown JWT token status " . $status . " found, failing authentication.");
        }

        if ($error) {
            return HelperController::generateResponse(null, [Errors::AUTHENTICATION_FAILED => $error], Errors::REQUEST_FAILED, 1, ResponseType::NOT_AUTHORIZED);
        }

        $user = JWT::resolveUserFromToken($token);
        $request->merge(['user' => $user]);
        Auth::setUser($user);

        $request->setUserResolver(
            function () use ($user) {
                return $user;
            }
        );

        return $next($request);
    }
}