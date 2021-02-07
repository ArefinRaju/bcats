<?php


namespace Helper\Route;


use Helper\Constants\CRUD;
use Illuminate\Support\Facades\Route;

class CombinedRoute
{
    public static function resourceRoute(string $slug, string $controller, array $middlewares, array $except = [], array $rules = []): void
    {
        $actionTaggedSlug = $slug . '/{id}'; // TODO : $slug.'/{id}[/{action}]'

        if (!self::ActionAllowed($rules, CRUD::VALIDATION)) {
            Route::get($slug . '/' . CRUD::VALIDATION, self::generateRouteOptions($slug, $controller, CRUD::VALIDATION, $middlewares));
        }

        if (!self::ActionAllowed($except, CRUD::RETRIEVE)) {
            Route::get($actionTaggedSlug, self::generateRouteOptions($slug, $controller, CRUD::RETRIEVE, $middlewares));
        }

        if (!self::ActionAllowed($rules, CRUD::CREATE)) {
            Route::post($slug, self::generateRouteOptions($slug, $controller, CRUD::CREATE, $middlewares));
        }

        if (!self::ActionAllowed($rules, CRUD::UPDATE)) {
            Route::put($actionTaggedSlug, self::generateRouteOptions($slug, $controller, CRUD::UPDATE, $middlewares));
        }

        if (!self::ActionAllowed($rules, CRUD::DESTROY)) {
            Route::delete($actionTaggedSlug, self::generateRouteOptions($slug, $controller, CRUD::DESTROY, $middlewares));
        }
    }

    private static function ActionAllowed(array $except, string $action): bool
    {
        if (!empty($except)) {
            return is_array($except) ? in_array($action, $except) : $action == $except;
        }

        return false;
    }

    private static function generateRouteOptions(
        string $slug,
        string $controller,
        string $action,
        array $middlewares
    ): array {
        $options = [
            'uses' => $controller.'@'.$action,
            'as'   => $slug.'_'.$action
        ];

        if (count($middlewares) != 0) {
            $options['middleware'] = $middlewares;
        }

        return $options;
    }
}
