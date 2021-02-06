<?php


namespace Helper\Route;


use Helper\Constants\CRUD;
use Illuminate\Support\Facades\Route;

class CombinedRoute
{
    public static function resourceRoute(
        string $slug,
        string $controller,
        array $middlewares,
        array $except = []
    ): void {
        $actionTaggedSlug = $slug.'/{id}'; // TODO : $slug.'/{id}[/{action}]'

        if (!self::ActionAllowed($except, CRUD::RETRIEVE)) {
            Route::get($actionTaggedSlug,
                self::generateRouteOptions($slug, $controller, CRUD::RETRIEVE, $middlewares));
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
            'as' => $slug.'_'.$action
        ];

        if (count($middlewares) != 0) {
            $options['middleware'] = $middlewares;
        }

        return $options;
    }
}
