<?php

function home_page(){
    load_view("home", "MasterSOFT - Главная");
}

function products_page(){
    load_view("products", "MasterSOFT - Продукты");
}

function product_page($matches){
    $code_name = $matches[0][1][0];
    if($product = dbQueryOne("SELECT * FROM products WHERE code_name = '{$code_name}'")){
        $services = dbQuery("SELECT * FROM product_services WHERE product_id = '{$product['id']}'");
        load_view("product", "MasterSOFT - {$product['display_name']}", ["PRODUCT" => $product, "SERVICES" => $services]);
        exit();
    }
    load_error(404, "Указанный Вами продукт отсутствует");
}

function answer_add(){
    $service = $_POST['service'];
    $name = verify_field("name", $_POST['name'], 4, 120);
    $tel = verify_field("tel", $_POST['tel'], 4, 60);
    $text = verify_field("text", $_POST['text'], 4, 120);

    if( dbExecute("INSERT INTO answers (service_id, name, tel, text) VALUES ('{$service}', '{$name}', '{$tel}', '{$text}')") ){
        send_answer([], true);
    }

    send_answer("Error with write into base");
}

function call_add(){
    $name = verify_field("name", $_POST['name'], 4, 120);
    $tel = verify_field("tel", $_POST['tel'], 4, 60);
    $text = verify_field("text", $_POST['text'], 4, 120);

    if( dbExecute("INSERT INTO calls (name, tel, text) VALUES ('{$name}', '{$tel}', '{$text}')") ){
        send_answer([], true);
    }
    send_answer("Error with write into base");
}

function company_page(){
    load_view("company", "MasterSOFT - О компании");
}

function contacts_page(){
    load_view("contacts", "MasterSOFT - Контакты", ["SYS_OFF_CONTENT" => true]);
}

function reviews_page(){
    $reviews = dbQuery("SELECT * FROM reviews WHERE showing = 1");
    load_view("reviews", "MasterSOFT - Отзывы", ["SYS_OFF_CONTENT" => true, "REVIEWS" => $reviews]);
}

function news_page(){
    $NEWS = dbQuery("SELECT * FROM news");
    load_view("news", "MasterSOFT - Новости", ["SYS_OFF_CONTENT" => true, "NEWS" => $NEWS]);
}

function reviews_add(){
    $name = verify_field("name", $_POST['name'], 4, 120);
    $text = verify_field("text", $_POST['text'], 4, 600);

    if( dbExecute("INSERT INTO reviews (name, text) VALUES ('{$name}', '{$text}')") ){
        send_answer([], true);
    }
    send_answer("Error with write into base");
}

function news_view_page($matches){
    $id = $matches[0][1][0];
    if($query = dbQueryOne("SELECT * FROM news WHERE id = '{$id}'")){
        load_view("news_view", "MasterSOFT - {$query['title']}", ["ARTICLE" => $query, "SYS_OFF_CONTENT" => true]);
        exit();
    }
    load_error(404, "Статьи не существует");
}