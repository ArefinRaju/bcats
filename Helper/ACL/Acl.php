<?php


namespace Helper\ACL;


use Helper\Constants\Errors;
use Helper\Core\UserFriendlyException;
use Illuminate\Http\Request;

class Acl
{
    /**
     * @param  Request  $request
     * @param  array|string  $permissions
     * @return bool
     * @throws UserFriendlyException
     */

    public static function authorize(Request $request, $permissions): bool
    {
        $out = false;
        if (is_array($permissions)) {
            foreach ($permissions as $permission) {
                if (self::isAuthorized($request, $permission)) {
                    $out = true;
                    break;
                }
            }
            if (!$out) {
                throw new UserFriendlyException(Errors::UNAUTHORIZED); // Todo : Use Respond
            }
            return true;
        }
        if (!self::isAuthorized($request, $permissions)) {
            throw new UserFriendlyException(Errors::UNAUTHORIZED);
        }
        return true;
    }

    public static function getUser(Request $request): object
    {
        return (object)$request->user();
    }

    /**
     * @param  Request  $request
     * @return string
     * @throws UserFriendlyException
     */

    public static function getUserRole(Request $request): string
    {
        $role = self::getUser($request)->acl;
        if (!in_array($role, Roles::values())) {
            // It might encoded, we doing double check
            $role = self::decodeRole($role);
            if (!in_array($role, Roles::values())) {
                throw new UserFriendlyException(Errors::AUTHENTICATION_TOKEN_MALFORMED);
            }
        }
        return $role;
    }

    public static function decodeRole(string $string): string
    {
        return base64_decode($string);
    }

    public static function createUserRole(string $userRole): string
    {
        return base64_encode($userRole);
    }

    /**
     * @param  Request  $request
     * @param  string  $permission
     * @return bool
     * @throws UserFriendlyException
     */

    public static function isAuthorized(Request $request, string $permission): bool
    {
        $accessList = constant('Helper\ACL\AccessMap::'.self::getUserRole($request));
        return in_array($permission, $accessList);
    }
}
