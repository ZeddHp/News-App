<?php declare(strict_types=1);

namespace App\Core;

use FastRoute;
class Router
{
    public static function route(array $routes)
    {

        $dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) use ($routes) {
            foreach ($routes as $route) {
                $r->addRoute($route['method'], $route['path'], $route['handler']);
            }
            // Add routes to the router
        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];


        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                return new View('notFound', []);
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                [$controller, $method] = $handler;

                return Container::get()->get($controller)->$method($vars);
        }
        return null;
    }
}