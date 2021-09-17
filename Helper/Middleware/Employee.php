<?php


namespace Helper\Middleware;


use Closure;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\Constants\Errors;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Illuminate\Http\Request;

final class Employee extends ApiMiddleware
{
    /**
     * Handle an incoming request.
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     * @throws UserFriendlyException
     */
    public function handle(Request $request, Closure $next)
    {
        // Only required for API call
        if (HelperController::isAPI()) {
            $request = self::assignAuth($request);
        }

        // Regular filter
        if (!Acl::authorize($request, [Permission::CREATE_MANAGER, Permission::CREATE_PROJECT])) {
            return redirect(url()->previous())->withErrors(Errors::UNAUTHORIZED);
        }
        return $next($request);
    }
}
