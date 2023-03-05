<?php

namespace Core;

class Router{

    protected $routes = [];

    protected function add($method,$uri,$controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }
    public function get($uri,$controller)
    {
        $this->add('GET',$uri,$controller);
    }

    public function post($uri,$controller)
    {
        $this->add('POST',$uri,$controller);
    }

    public function delete($uri,$controller){
        $this->add('DELETE',$uri,$controller);
    }

    public function put($uri,$controller){
        $this->add('PUT',$uri,$controller);
    }

    public function patch($uri, $controller){
        $this->add('PATCH',$uri,$controller);
    }

    public function route($uri,$method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                return require base_path($route['controller']); 
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code(404);
        require base_path("views/{$code}.php");
        exit;
    }
}
// $routes = require base_path('routes.php');

// function routeToController($url, $routes)
// {
//     if (array_key_exists($url, $routes)) {
//         require base_path($routes[$url]);
//     } else {
//         abort(404);
//     }
// }

// function abort($code = 404)
// {
//     http_response_code(404);
//     require base_path("views/{$code}.php");
//     exit;
// }

// $url = parse_url($_SERVER['REQUEST_URI'])["path"];
// routeToController($url, $routes);


/** METHOD 1 */
//dd($url);
// if($url === '/'){
// require 'controllers/index.php';
// }else if($url === '/contact'){
// require 'controllers/contact.php';
// }else if($url === '/about'){
// require 'controllers/about.php';
// }