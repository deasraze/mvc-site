<?php

    return array(
        '' => 'site/index', // actionIndex and SiteController
        'contacts' => 'site/contact', // actionContact and SiteController

        'collection' => 'collection/index', // actionIndex and CollectionController
        'collection/([0-9]+)' => 'collection/view/$1', // actionView and CollectionController
        'collection/page-([0-9]+)' => 'collection/index/$1', // actionIndex and CollectionController

        // id + название
        //'collection/([0-9]+)-([a-z0-9-]+)' => 'collection/view/$1', // actionView and CollectionController

        'tickets' => 'tickets/index',
        'tickets/([0-9]+)' => 'tickets/view/$1',

        'cart' => 'cart/index', // actionIndex and CartController
        'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd and CartController

        'category/([0-9]+)' => 'collection/category/$1', // actionCategory and CollectionController
        'category/([0-9]+)/page-([0-9]+)' => 'collection/category/$1/$2', // actionCategory and CollectionController

        'news/([0-9]+)' => 'news/view/$1',
        'news' => 'news/index',

        'user/register' => 'user/register', // actionRegister and UserController
        'user/login' => 'user/login', // actionLogin and UserController
        'user/logout' => 'user/logout', // actionLogout and UserController

        'cabinet' => 'cabinet/index',
        'cabinet/edit' => 'cabinet/edit',

        '.+' => 'site/error',
        //'news' => 'news/index', //actionIndex в NewsController
        //'products' => 'product/list', //actionList в ProductController
    );