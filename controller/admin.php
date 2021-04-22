<?php

function githubUpdate(){
    @system(`git pull`);
}

function auth_page(){
    load_view("admin/auth", "MasterSOFT - Авторизация", ["SYS_OFF_CONTENT" => true]);
}

function auth_process(){
    if(isset($_COOKIE['authsession'])) send_answer("You already authorized!");

    $login = verify_field("login", $_POST['login'], 1, 120);
    $password = verify_field("password", $_POST['password'], 1, 0);

    if( $query = dbQueryOne("SELECT * FROM accounts WHERE login = '{$login}'") ){
        if(!password_verify($password, $query['password'])){
            send_answer("Incorrect password!");
        }

        $sessionkey = hash("sha256", time().$query['id']);
        $ip = $_SERVER['REMOTE_ADDR'];

        if(dbExecute("INSERT INTO account_sessions (aid, sessionkey, ip) VALUES ('{$query['id']}', '{$sessionkey}', '{$ip}')")){
            setcookie("authsession", $sessionkey, time()+3600*24*30, "/");
            send_answer([], true);
        }

        send_answer("Unknown error database writing");
    }
}

function dashboard_page(){
    load_view("admin/auth", "MasterSOFT - Панель администратора", [], "admin");
}

function reviews_page(){
    $reviews = dbQuery("SELECT * FROM reviews WHERE reviews.showing = 0");
    load_view("admin/reviews", "MasterSOFT - Модерация отзывов", ["REVIEWS" => $reviews], "admin");
}

function reviews_process(){
    $id = $_POST['id'];
    $type = $_POST['type'];
    $text = $_POST['text'];

    if($type > 1){
        send_answer("Unknown type reviews");
    }

    if($type == 0){
        if( dbExecute("UPDATE reviews SET showing = '1', text = '{$text}' WHERE id = '{$id}'") ){
            send_answer([], true);
        }
        send_answer("Unknown error database writing");
    } else if($type == 1){
        if( dbExecute("DELETE FROM reviews WHERE id = '{$id}'") ){
            send_answer([], true);
        }
    }

    send_answer("Unknown error database writing");
}