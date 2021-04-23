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

function news_page(){
    $news = dbQuery("SELECT * FROM news");
    load_view("admin/news", "MasterSOFT - Модерация новостей", ["NEWS" => $news], "admin");
}

function news_new_page(){
    load_view("admin/news_new", "MasterSOFT - Новая статья", [], "admin");
}

function news_new_process(){
    $title = verify_field("title", $_POST['title'], 4, 120);
    $text = verify_field("text", $_POST['text'], 4, 0);
    $image = $_FILES['image'];
    $path = "/content/image/".hash("sha256", time().strlen(basename($image['name']))).".jpg";
    if (move_uploaded_file($image['tmp_name'], ROOTDIR.$path)) {
        if(dbExecute("INSERT INTO news (title, text, image) VALUES ('{$title}', '{$text}', '{$path}')")){
            send_answer([], true);
        }
        send_answer(["Unknown error with write to db"]);
    }
    send_answer(["Unknown upload image error"]);
}

function news_edit_page($matches){
    $id = $matches[0][1][0];
    if($query = dbQueryOne("SELECT * FROM news WHERE id = '{$id}'")){
        load_view("admin/news_edit", "MasterSOFT - {$query['title']}", ["ARTICLE" => $query], "admin");
    }
}

function news_edit_process($matches){
    $id = $matches[0][1][0];
    $title = verify_field("title", $_POST['title'], 4, 120);
    $text = verify_field("text", $_POST['text'], 4, 0);
    $sql_part = "UPDATE news SET title='{$title}', text='{$text}'";
    $image = $_FILES['image'];
    $path = "/content/image/".hash("sha256", time().strlen(basename($image['name']))).".jpg";
    if (!move_uploaded_file($image['tmp_name'], ROOTDIR.$path) && $image != null) {
        send_answer(["Unknown upload image error"]);
    } else if($image != null){
        $sql_part .= ", image='{$path}'";
    }

    if(dbExecute($sql_part." WHERE id='{$id}'")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}