<?php

return [
    [
        "url" => "/",
        "method" => "get",
        "controller" => "main",
        "function" => "home_page"
    ],

    [
        "url" => "/products/",
        "method" => "get",
        "controller" => "main",
        "function" => "products_page"
    ],

    [
        "url" => "/products.(\w+)/",
        "method" => "get",
        "controller" => "main",
        "function" => "product_page"
    ],

    [
        "url" => "/product/answer/add/",
        "method" => "post",
        "controller" => "main",
        "function" => "answer_add"
    ],

    [
        "url" => "/call/add/",
        "method" => "post",
        "controller" => "main",
        "function" => "call_add"
    ],

    [
        "url" => "/company/",
        "method" => "get",
        "controller" => "main",
        "function" => "company_page"
    ],

    [
        "url" => "/company/contacts/",
        "method" => "get",
        "controller" => "main",
        "function" => "contacts_page"
    ],

    [
        "url" => "/company/reviews/",
        "method" => "get",
        "controller" => "main",
        "function" => "reviews_page"
    ],

    [
        "url" => "/news/",
        "method" => "get",
        "controller" => "main",
        "function" => "news_page"
    ],

    [
        "url" => "/gitUpdate/",
        "method" => "get",
        "controller" => "admin",
        "function" => "githubUpdate"
    ]
];