<?php

namespace cvendor;

class Router
{

    protected static array $routes = [];
    protected static array $route = [];

    public static function addRoute(string $regexp, array $route = []): void
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function dispatch($url): void
    {
        if (self::matchRoute($url)) {
            echo 'OK';
        } else {
            echo 'ERROR';
        }
    }

    public static function matchRoute(string $url): bool
    {

        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (empty($route[ACTION])) {
                    $route[ACTION] = 'index';
                }
                if (!isset($route[ADMIN_PREFIX])) {
                    $route[ADMIN_PREFIX] = '';
                } else {
                    $route[ADMIN_PREFIX] = '\\';
                }

                $route[CONTROLLER] = self::formatControllerName($matches[CONTROLLER]);
                $route[ACTION] = self::formatActionName($matches[ACTION]);
                debug($route);
                return true;
            }
        }
        return false;
    }

    protected static function formatControllerName(string $controller): string
    {
        return formatString($controller);
    }

    protected static function formatActionName(string $action): string
    {
        return formatString($action, 'camelCase');
    }
}