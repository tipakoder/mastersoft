<?php

require_once "init.php";

try{
    $route = getRoute();

    if( $route !== false ){
        load_page($route);
    } else {
        load_error(404, "Страница не найдена");
    }
}catch(\Exception $e){
    load_error(422, "Проблемы с загрузкой модулей");
}