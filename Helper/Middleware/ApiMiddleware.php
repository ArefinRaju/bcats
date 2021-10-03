<?php

namespace Helper\Middleware;

use Helper\Constants\Errors;
use Helper\Constants\JWTTokenStatus;
use Helper\Constants\ResponseType;
use Helper\Core\JWT;
use Helper\Core\UserFriendlyException;
use Helper\Transform\Strings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Lcobucci\JWT\Token;

class ApiMiddleware
{
    /**
     * @throws UserFriendlyException
     */
    public function assignAuth(Request $request): Request
    {
        $token = $request->header('Authorization');
        if (!$token) {
            throw new UserFriendlyException(Errors::AUTHENTICATION_TOKEN_MALFORMED, ResponseType::NOT_AUTHORIZED);
        }
        if (!Strings::hasPrefix($token, 'Bearer ')) {
            throw new UserFriendlyException(Errors::AUTHENTICATION_TOKEN_MALFORMED, ResponseType::NOT_AUTHORIZED);
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
                Log::warning("Unknown JWT token status ".$status." found, failing authentication.");
        }

        if ($error) {
            throw new UserFriendlyException($error, ResponseType::NOT_AUTHORIZED);
        }

        $user = JWT::resolveUserFromToken($token);
        $request->merge(['user' => $user]);
        Auth::setUser($user);

        $request->setUserResolver(
            function () use ($user) {
                return $user;
            }
        );

        return $request;
    }
}
