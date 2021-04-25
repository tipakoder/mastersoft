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
    load_view("admin/dashboard", "MasterSOFT - Панель администратора", [], "admin");
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


function news_delete_process(){
    $id = $_POST['id'];
    if(dbExecute("DELETE FROM news WHERE id = '{$id}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

// PRODUCTS

function products_page(){
    load_view("admin/products", "MasterSOFT - Продукты", [], "admin");
}

function product_new_page(){
    load_view("admin/product_new", "MasterSOFT - Добавление продукта", [], "admin");
}

function product_new_process(){
    $icon = verify_field("icon", $_POST['icon'], 1, 120);
    $displayname = verify_field("display name", $_POST['display_name'], 1, 60);
    $codename = verify_field("code name", $_POST['code_name'], 1, 20);
    $text = verify_field("text", $_POST['text'], 4, 400);

    if(dbExecute("INSERT INTO products (display_name, code_name, icon, text) VALUES ('{$displayname}', '{$codename}', '{$icon}', '{$text}')")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

function product_update_process(){
    $id = $_POST['id'];
    $icon = verify_field("icon", $_POST['icon'], 1, 120);
    $displayname = verify_field("display name", $_POST['display_name'], 1, 60);
    $codename = verify_field("code name", $_POST['code_name'], 1, 20);
    $text = verify_field("text", $_POST['text'], 4, 400);

    if(dbExecute("UPDATE products SET display_name = '{$displayname}', code_name = '{$codename}', icon = '{$icon}', text = '{$text}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

function product_delete_process(){
    $id = $_POST['id'];
    if(dbExecute("DELETE FROM products WHERE id = '{$id}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

function product_edit_page($matches){
    $code_name = $matches[0][1][0];
    if($product = dbQueryOne("SELECT * FROM products WHERE code_name = '{$code_name}'")){
        $services = dbQuery("SELECT * FROM product_services WHERE product_id = '{$product['id']}'");
        load_view("admin/product_edit", "MasterSOFT - {$product['display_name']}", ["PRODUCT" => $product, "SERVICES" => $services], "admin");
        exit();
    }
    load_error(404, "Указанный Вами продукт отсутствует");
}

function product_edit_service_process(){
    $product_id = $_POST['id'];
    $name = verify_field("name", $_POST['name'], 1, 120);
    $image = $_FILES['image'];
    $path = "/content/products/".hash("sha256", time().strlen(basename($image['name']))).".jpg";
    if (!move_uploaded_file($image['tmp_name'], ROOTDIR.$path) && $image != null) {
        send_answer(["Unknown upload image error"]);
    }

    if(dbExecute("INSERT INTO product_services (product_id, name, image) VALUES ('$product_id', '{$name}', '{$path}')")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

function product_delete_service_process(){
    $id = $_POST['id'];
    if(dbExecute("DELETE FROM product_services WHERE id = '{$id}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

// CALLS

function call_page(){
    $calls = dbQuery("SELECT * FROM calls");
    load_view("admin/calls", "MasterSOFT - Заявки на звонок", ["CALLS"=>$calls], "admin");
}

function call_process(){
    $id = $_POST['id'];
    if(dbExecute("DELETE FROM calls WHERE id = '{$id}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}

// ADVICE

function advice_page(){
    $advice = dbQuery("SELECT answers.*, products.display_name as product, product_services.name as service FROM answers, products, product_services WHERE products.id = product_services.product_id AND product_services.id = answers.service_id");
    load_view("admin/advice", "MasterSOFT - Заявки на консультацию", ["ADVICES"=>$advice], "admin");
}

function advice_process(){
    $id = $_POST['id'];
    if(dbExecute("DELETE FROM answers WHERE id = '{$id}' LIMIT 1")){
        send_answer([], true);
    }
    send_answer(["Unknown error with write to db"]);
}