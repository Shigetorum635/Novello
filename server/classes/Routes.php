<?php
class Routes
{
    static function get($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            self::route($route, $path_to_include);
        }
    }
    static function post($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::route($route, $path_to_include);
        }
    }
    static function put($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            self::route($route, $path_to_include);
        }
    }
    static function patch($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
            self::route($route, $path_to_include);
        }
    }
    static function delete($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            self::route($route, $path_to_include);
        }
    }
    static function any($route, $path_to_include)
    {
        self::route($route, $path_to_include);
    }
    static function route($route, $path_to_include)
    {
        $ROOT = $_SERVER['DOCUMENT_ROOT'];
        if ($route == "/404") {
            include_once("$ROOT/$path_to_include");
            exit();
        }
        $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $request_url = rtrim($request_url, '/');
        $request_url = strtok($request_url, '?');
        $route_parts = explode('/', $route);
        $request_url_parts = explode('/', $request_url);
        array_shift($route_parts);
        array_shift($request_url_parts);
        if ($route_parts[0] == '' && count($request_url_parts) == 0) {
            include_once("$ROOT/$path_to_include");
            exit();
        }
        if (count($route_parts) != count($request_url_parts)) {
            return;
        }
        $parameters = [];
        for ($i = 0; $i < count($route_parts); $i++) {
            $route_part = $route_parts[$i];
            if (preg_match("/^[$]/", $route_part)) {
                $route_part = ltrim($route_part, '$');
                array_push($parameters, $request_url_parts[$i]);
                $$route_part = $request_url_parts[$i];
            } else if ($route_parts[$i] != $request_url_parts[$i]) {
                return;
            }
        }
        include_once("$ROOT/$path_to_include");
        exit();
    }
    static function out($text)
    {
        echo htmlspecialchars($text);
    }
    static function set_csrf()
    {
        $csrf_token = bin2hex(random_bytes(25));
        $_SESSION['csrf'] = $csrf_token;
        echo '<input type="hidden" name="csrf" value="' . $csrf_token . '">';
    }
    static function is_csrf_valid()
    {
        if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
            return false;
        }
        if ($_SESSION['csrf'] != $_POST['csrf']) {
            return false;
        }
        return true;
    }
}
