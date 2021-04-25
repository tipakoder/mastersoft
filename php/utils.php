<?php

function load_config($name){
    $path = ROOTDIR."/config/{$name}.php";

    if(file_exists($path)){
        return require_once $path;
    }
    return false;
}

function load_page($route){
    $options = (isset($route['matches'])) ? [$route['matches']] : [];
    try{
        require_once ROOTDIR."/controller/{$route["controller"]}.php";
        if(is_callable($route["function"])){
            call_user_func($route["function"], $options);
        } else {
            load_error(404, "Страница не найдена");
        }
    }catch(\Exception $e){
        load_error(404, "Страница не найдена");
    }
}

function load_view($view, $title, $params = [], $template = "template"){
    global $level_access, $currentUser;

    $extract = array_merge([
        "SYS_CURRENTUSER" => $currentUser,
        "SYS_TITLE" => $title,
        "SYS_PAGE" => $view,
        "AUTH" => ($level_access < 2) ? true : false,
        "SYS_LEVELACCESS" => $level_access,
        "PRODUCTS" => dbQuery("SELECT * FROM products"),
        "HOT_NEWS" => dbQuery("SELECT * FROM news ORDER BY id DESC LIMIT 3")
    ], $params);

    extract($extract);

    require_once "view/{$template}.php";
}

function verify_field($name, $value, $min = 4, $max = 120, $forriden_symbols = ""){
    if(strlen($value) < $min && $min !== 0){
        send_answer("Field '{$name}' is too small (min: {$min})");
    }
    if(strlen($value) > $max && $max !== 0){
        send_answer("Field '{$name}' is too long (max: {$max})");
    }
    if($forriden_symbols != ""){
        $pattern = "[{$forriden_symbols}]";
        if(preg_match_all($pattern, $value)){
            send_answer("Field '{$name}' have a forriden symbols: {$forriden_symbols}");
        }
    }

    return $value;
}

function send_answer($data = [], $type = false){
    $type = ($type) ? "success" : "error";
    header('Content-Type: application/json; charset=utf-8');
    exit(json_encode([
        "type" => $type,
        "data" => $data
    ], JSON_PRETTY_PRINT));
}

function load_error($code, $more = null){
    load_view("", "Ошибка {$code}", ["code" => $code, "more" => $more], "error");
}