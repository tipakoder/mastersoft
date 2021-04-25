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
    ],

    [
        "url" => "/admin/news/",
        "method" => "get",
        "controller" => "admin",
        "function" => "news_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/news/new/",
        "method" => "get",
        "controller" => "admin",
        "function" => "news_new_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/news/new/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "news_new_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin.news.(\d+).edit/",
        "method" => "get",
        "controller" => "admin",
        "function" => "news_edit_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin.news.edit.(\d+).process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "news_edit_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/news/delete/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "news_delete_process",
        "level_access" => 1
    ],

    [
        "url" => "/news.(\d+)/",
        "method" => "get",
        "controller" => "main",
        "function" => "news_view_page",
        "level_access" => 2
    ],

    [
        "url" => "/admin/products/",
        "method" => "get",
        "controller" => "admin",
        "function" => "products_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/products/new/",
        "method" => "get",
        "controller" => "admin",
        "function" => "product_new_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/products/new/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "product_new_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/products/update/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "product_update_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/products/delete/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "product_delete_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin.products.(\w+)/",
        "method" => "get",
        "controller" => "admin",
        "function" => "product_edit_page"
    ],

    [
        "url" => "/admin/products/service/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "product_edit_service_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/products/service/delete/",
        "method" => "post",
        "controller" => "admin",
        "function" => "product_delete_service_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/calls/",
        "method" => "get",
        "controller" => "admin",
        "function" => "call_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/calls/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "call_process",
        "level_access" => 1
    ],

    [
        "url" => "/admin/advice/",
        "method" => "get",
        "controller" => "admin",
        "function" => "advice_page",
        "level_access" => 1
    ],

    [
        "url" => "/admin/advice/process/",
        "method" => "post",
        "controller" => "admin",
        "function" => "advice_process",
        "level_access" => 1
    ]
];