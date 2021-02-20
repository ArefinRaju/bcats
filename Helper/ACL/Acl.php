<?php


namespace Helper\ACL;


use Helper\Constants\Errors;
use Helper\Core\UserFriendlyException;
use Illuminate\Http\Request;

class Acl
{
    /**
     * @param  Request  $request
     * @param  string  $permission
     * @return bool
     * @throws UserFriendlyException
     */

    public static function authorize(Request $request, string $permission): bool
    {
        $accessList = constant('Helper\ACL\AccessMap::'.self::getUserRole($request));
        return in_array($permission, $accessList);
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
        $decodedRole = base64_decode(self::getUser($request)->acl);
        if (!in_array($decodedRole, Roles::values())) {
            throw new UserFriendlyException(Errors::AUTHENTICATION_TOKEN_MALFORMED);
        }
        return $decodedRole;
    }

    public static function createUserRole(string $userRole = Roles::EMPLOYEE): string
    {
        return base64_encode($userRole);
    }
}