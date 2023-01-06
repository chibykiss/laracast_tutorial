<?php

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