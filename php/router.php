<?php

$currentUrl = array_shift(explode("?", $_SERVER["REQUEST_URI"]));
$currentMethod = strtolower($_SERVER["REQUEST_METHOD"]);
$routesList = load_config("routesList");

function getRoute(){
    global $currentMethod, $currentUrl, $routesList, $level_access;

    foreach($routesList as $route){
        $re = "/^".str_replace("/", ".", trim($route["url"], "/"))."$/";
        preg_match($re, trim($currentUrl, "/"), $matches, PREG_OFFSET_CAPTURE, 0);

        if( (trim($route["url"], "/") === trim($currentUrl, "/") || isset($matches[1]) ) && $route["method"] === $currentMethod){
            if(isset($route["level_access"])){
                if($route["level_access"] < $level_access){
                    load_error(401, "Доступ запрещён");
                    exit;
                }
            }

            if(isset($matches[1])) $route['matches'] = $matches;
            return $route;
        }
    }
    return false;
}