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

    protected static function removeQueryString(string $url): string
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === str_contains($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }
        return '';
    }

    /**
     * @throws \Exception
     */
    public static function dispatch($url): void
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route[ADMIN_PREFIX] . self::$route[CONTROLLER] . 'Controller';
            if (class_exists($controller)) {

                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);

                $controllerObject->getModel();

                $action = self::formatActionName(self::$route[ACTION] . 'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw  new \Exception("Action <b>'{$controller::$action}'</b> not found", 404);
                }
            } else {
                throw new \Exception("Controller <b>'{$controller}'</b> not found", 404);
            }
        } else {
            throw new \Exception('Route not found', 404);
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
                    $route[ADMIN_PREFIX] .= '\\';
                }

                if (!isset($route[CONTROLLER])) {
                    $route[CONTROLLER] = self::formatControllerName($matches[CONTROLLER]);
                } else {
                    $route[CONTROLLER] = self::formatControllerName($route[CONTROLLER]);
                }
                if (!isset($route[ACTION])) {
                    $route[ACTION] = self::formatActionName($matches[ACTION]);
                } else {
                    $route[ACTION] = self::formatActionName($route[ACTION]);
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    protected static function formatControllerName(string $controller): string
    {
        return formatString($controller, '');
    }

    protected static function formatActionName(string $action): string
    {
        return formatString($action, 'camelCase');
    }
}
