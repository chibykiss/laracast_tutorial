<?php
$url = parse_url($_SERVER['REQUEST_URI'])["path"];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort(404);
    }
}

function abort($code = 404)
{
    http_response_code(404);
    require "views/{$code}.php";
    exit;
}

routeToController($url, $routes);


/** METHOD 1 */
//dd($url);
// if($url === '/'){
// require 'controllers/index.php';
// }else if($url === '/contact'){
// require 'controllers/contact.php';
// }else if($url === '/about'){
// require 'controllers/about.php';
// }