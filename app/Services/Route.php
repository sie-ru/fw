<?php


namespace App\Services;

class Route 
{
    private static $list = [];

    public static function page($uri, $page_name)
    {
        self::$list[] = [
            "uri" => $uri,
            "page_name" => $page_name
        ];
    }

    public static function enable()
    {
        $get_query = $_GET['q'];

        foreach(self::$list as $route) {
            if($route['uri'] === '/' . $get_query) {
                require_once "views/" . $route['page_name'] . '.php';
                die();
            }
        }

        self::pageNotFound();
    }

    private static function pageNotFound() {
        require_once 'views/errors/404.php';
    }
}