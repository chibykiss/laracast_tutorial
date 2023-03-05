<?php

use Core\Response;
function dd($value)
{
    //check die and dump
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit();
}

function isUrl($url){
    return $_SERVER['REQUEST_URI'] === $url;
}

function abort($code = 404)
{
    http_response_code(404);
    require base_path("views/{$code}.php");
    exit;
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH.$path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/'.$path);
}