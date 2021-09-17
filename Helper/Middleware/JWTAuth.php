<?php


namespace Helper\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class JWTAuth extends ApiMiddleware
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return JsonResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
        $request = self::assignAuth($request);
        return $next($request);
    }
}
