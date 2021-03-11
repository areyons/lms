<?php


namespace lms;


class Router
{

    protected static $routes = [];                  // routes list
    protected static $route = [];                   // get route

    public static function addRoute($regexp, $route = [])
    {

        self::$routes[$regexp] = $route;

    }

    public static function getRoutes()
    {

        return self::$routes;

    }

    public static function getRoute()
    {

        return self::$route;

    }

    // take url from App.php
    public static function dispatch($url)
    {
        // extract params from url
        $url = self::removeQueryString($url);

        // checked if routes exists in url
        if (self::matchRoute($url)) {

            // get called controller
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

            if (class_exists($controller)) {

                // create an object from the received controller class
                $controllerObject = new $controller(self::$route);

                // get called action
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                // call method from the received controller class if its exist
                if (method_exists($controllerObject, $action)) {

                    $controllerObject->$action();

                } else {
                    throw new \Exception("Method: $controller::$action - does not exist", 404);
                }

                // get view
                $controllerObject->getView();

            } else {
                throw new \Exception("Controller: $controller - does not exist", 404);
            }

        } else {
            throw new \Exception('Page Not Found', 404);
        }

    }

    public static function matchRoute($url) : bool      // search routes
    {

        foreach (self::$routes as $pattern => $route) {

            // set controller - action

            if(preg_match("#{$pattern}#", $url, $matches)) {

                foreach ($matches as $key => $value) {
                    if(is_string($key)) {
                        $route[$key] = $value;
                    }
                }

                // set default action as index

                if(empty($route['action'])) {
                    $route['action'] = 'index';
                }

                // set default prefix as \

                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                // make first letter big in controller name, replace char '-' if its need
                $route['controller'] = self::upperCamelCase($route['controller']);

                // put it in to $route
                self::$route = $route;

                return true;
            }

        }

        return false;
    }

    // explode params from url
    protected static function removeQueryString($url)
    {

        if($url) {
            $params = explode('&', $url);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }


    }

     // make first letter big in the received controller name, replace char '-' to '' if its need
     protected static function upperCamelCase($name)
     {
         return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
     }
    // make first letter lower in the received action name
     protected  static function lowerCamelCase($name)
     {
        return lcfirst(self::upperCamelCase($name));
     }
}