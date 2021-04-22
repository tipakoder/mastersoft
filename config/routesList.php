<?php

return [
    [
        "url" => "/gitUpdate/",
        "method" => "post",
        "controller" => "admin",
        "function" => "githubUpdate"
    ],

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
        "url" => "/admin/auth/",
        "method" => "get",
        "controller" => "admin",
        "function" => "auth_page"
    ],

    [
        "url" => "/admin/auth/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "auth_process"
    ],

    [
        "url" => "/admin/",
        "method" => "get",
        "controller" => "admin",
        "function" => "dashboard_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/reviews/",
        "method" => "get",
        "controller" => "admin",
        "function" => "reviews_page",
        "level_access" => 1
    ],

    [
        "url" => "/reviews/add/",
        "method" => "post",
        "controller" => "main",
        "function" => "reviews_add",
        "level_access" => 2
    ],

    [
        "url" => "/admin/reviews/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "reviews_process",
        "level_access" => 1
    ]
];