<?php


namespace Helper\Middleware;


use Closure;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\Constants\Errors;
use Helper\Core\UserFriendlyException;
use Illuminate\Http\Request;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     * @throws UserFriendlyException
     */
    public function handle(Request $request, Closure $next)
    {
        if (Acl::authorize($request, [Permission::VIEW_RESOURCE, Permission::USE_RESOURCE])) {
            return $next($request);
        }
        throw new UserFriendlyException(Errors::FORBIDDEN);
    }
}