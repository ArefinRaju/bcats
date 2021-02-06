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
        array $rules = []
    ): void {
        $actionTaggedSlug = $slug.'/{id}'; // TODO : $slug.'/{id}[/{action}]'

        if (!self::ActionAllowed($rules, CRUD::RETRIEVE)) {
            Route::get($actionTaggedSlug,
                self::generateRouteOptions($slug, $controller, CRUD::RETRIEVE, $middlewares));
        }
    }

    private static function ActionAllowed(array $rules, string $action): bool
    {
        if (isset($rules['excluded'])) {
            return is_array($rules['excluded']) ? in_array($action, $rules['excluded']) : $action == $rules['excluded'];
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
