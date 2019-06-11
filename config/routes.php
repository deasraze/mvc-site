<?php

    return array(
        // Главная страница
        '' => 'site/index', // actionIndex and SiteController
        // Страница обратной связи
        'contacts' => 'site/contact', // actionContact and SiteController

        // Страница с вакансиями
        'jobs' => 'jobs/index', // actionIndex and JobsController

        // Страницы с коллекциями
        'collection' => 'collection/index', // actionIndex and CollectionController
        'collection/([0-9]+)' => 'collection/view/$1', // actionView and CollectionController
        'collection/page-([0-9]+)' => 'collection/index/$1', // actionIndex and CollectionController

        // id + название
        //'collection/([0-9]+)-([a-z0-9-]+)' => 'collection/view/$1', // actionView and CollectionController

        // Страницы с билетами
        'tickets' => 'tickets/index', // actionIndex and TicketsController
        'tickets/page-([0-9]+)' => 'tickets/index/$1', // // actionIndex and TicketsController

        // Страницы с корзиной
        'cart' => 'cart/index', // actionIndex and CartController
        'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd and CartController
        'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete and CartController
        'cart/delamount/([0-9]+)' => 'cart/delamount/$1', // actionDelamount and CartController
        'cart/checkout' => 'cart/checkout', // actionCheckout and CartController

        // Страницы с категорями
        'category/([0-9]+)' => 'collection/category/$1', // actionCategory and CollectionController
        'category/([0-9]+)/page-([0-9]+)' => 'collection/category/$1/$2', // actionCategory and CollectionController

        // Страницы с новостями
        'news' => 'news/index', // actionIndex and NewsController
        'news/page-([0-9]+)' => 'news/index/$1', // actionIndex and NewsController
        'news/([0-9]+)' => 'news/view/$1', // actionView and NewsController

        // Страницы пользователя
        'user/register' => 'user/register', // actionRegister and UserController
        'user/login' => 'user/login', // actionLogin and UserController
        'user/logout' => 'user/logout', // actionLogout and UserController

        // Страницы личного кабинета
        'cabinet' => 'cabinet/index', // actionIndex and CabinetController
        'cabinet/edit' => 'cabinet/edit', // actionEdit and CabinetController
        'cabinet/editpassword' => 'cabinet/editpassword', // actionEditpassword and CabinetController

        // Главная страницы админки
        'admin' => 'admin/index', // actionIndex and AdminController
        'admin/logout' => 'admin/logout', // actionLogout and AdminController
        'admin/login' => 'admin/login', // actionLogin and AdminController
        'admin/search' => 'admin/search', // actionSearch and AdminController
        'admin/settings' => 'admin/settings', // actionSettings and AdminController
        // Управление коллекциями
        'admin/collection' => 'adminCollection/index',
        'admin/collection/page-([0-9]+)' => 'adminCollection/index/$1',
        'admin/collection/search' => 'adminCollection/search',
        'admin/collection/create' => 'adminCollection/create',
        'admin/collection/update/([0-9]+)' => 'adminCollection/update/$1',
        'admin/collection/delete/([0-9]+)' => 'adminCollection/delete/$1',
        // Управление категорями
        'admin/category' => 'adminCategory/index',
        'admin/category/page-([0-9]+)' => 'adminCategory/index/$1',
        'admin/category/create' => 'adminCategory/create',
        'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
        'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
        // Управление заказами
        'admin/order' => 'adminOrder/index',
        'admin/order/page-([0-9]+)' => 'adminOrder/index/$1',
        'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
        'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
        'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
        // Управление билетами
        'admin/ticket' => 'adminTicket/index',
        'admin/ticket/page-([0-9]+)' => 'adminTicket/index/$1',
        'admin/ticket/create' => 'adminTicket/create',
        'admin/ticket/update/([0-9]+)' => 'adminTicket/update/$1',
        'admin/ticket/delete/([0-9]+)' => 'adminTicket/delete/$1',
        // Управление Пользователями
        'admin/user' => 'adminUser/index',
        'admin/user/page-([0-9]+)' => 'adminUser/index/$1',
        'admin/user/create' => 'adminUser/create',
        'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
        'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',

        // 404
        '.+' => 'site/error',
        //'news' => 'news/index', //actionIndex в NewsController
        //'products' => 'product/list', //actionList в ProductController
    );