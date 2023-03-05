<?php
const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'core/Helpers.php';

// require base_path('Database.php');
// require base_path('Response.php');
spl_autoload_register(function($class){

    //remove replace the foward slash with a backward slash
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    //dd($class);
    require base_path("{$class}.php");
});
//require base_path('Core/router.php');

$router = new \Core\Router;

$routes = require base_path('routes.php');
$url = parse_url($_SERVER['REQUEST_URI'])["path"];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($url,$method);
// routeToController($url, $routes);


 