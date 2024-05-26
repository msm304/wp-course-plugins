<?php

class Router
{

    public function __construct()
    {
        add_action('init', [$this, 'routes_handler']);
    }

    public function routes_handler()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        //    var_dump('request_uri: ' . $request_uri);
        $request_uri = str_replace('-', '_', $request_uri);
        /* var_dump($request_uri);*/
        $this->dispatch_uri($request_uri);
    }
    private function parse_uri($uri)
    {
        // var_dump('uri: '. $uri);

        $parse_uri = explode('/', strtok($uri, '?'));
        $last_part_uri = substr($uri, strrpos($uri, '/') + 1);
        // var_dump($last_part_uri);
        if (is_numeric($last_part_uri)) {
            //    echo 'numeric';
            $path = parse_url($uri, PHP_URL_PATH);
            // var_dump('PHP_URL_PATH: ' . PHP_URL_PATH);
            // var_dump('parse_url($uri, 5): ' .  parse_url($uri, 5));
            $modified_uri = preg_replace('#^/[^/]+#', '', $path);
            // var_dump($modified_uri); // خروجی: /dashboard/courses/edit/2
            $parts = explode('/', $modified_uri);
            // var_dump($parts);
            // var_dump('path: ' . $path);
            // var_dump([count($parts)]);
            // var_dump($parts[count($parts) - 2]);
            return $parts[count($parts) - 2];
        } else {
            return end($parse_uri);
        }
    }
    private function dispatch_uri($request_uri)
    {
        if (strpos($request_uri, 'dashboard') === false) {
            return;
        }
        $controller = $this->parse_uri($request_uri);
        $controller_name =  $this->format_controller_file($controller);
        /*return $this->get_controller_file($controller_name);*/
        /*return $this->is_valid_controller($controller_name);*/
        if ($this->is_valid_controller($controller_name)) {
            $controller_path = $this->get_controller_file($controller_name);
            require_once $controller_path;
            $controllerInstance = new $controller_name;
            $controllerInstance->index();
            exit();
        } else {
            die('کنترل مورد نظر شما نامعتبر می باشد!!');
            /*throw new Exception('کنترل مورد نظر شما نامعتبر می باشد!!');*/
        }
    }
    private function format_controller_file($controller)
    {
        /*CourseController;*/
        return ucfirst($controller) . 'Controller';
    }
    private function get_controller_file($controller_name)
    {
        return WCP_PLUGIN_DIR . 'dashboard/Controller/' . $controller_name . '.php';
    }
    private function is_valid_controller($controller_name)
    {
        $controller_file_path = $this->get_controller_file($controller_name);
        return file_exists($controller_file_path) && is_readable($controller_file_path);
    }
}
new Router();
