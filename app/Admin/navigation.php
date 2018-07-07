<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)


return [
    //Главная страница
    [
        'title' => 'Главная',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],
    //Пользователи
    [
        'title' => 'Пользователи',
        'icon' => 'fa fa-users',
        'pages' => [
            [
                'title' => 'Администрация',
                'url' => route('admin.admins'),
                'icon' => 'fa fa-lock',
            ],

            [
                'title' => 'Пользователи',
                'url' => route('admin.users'),
                'icon' => 'fa fa-user',
            ],
        ],

    ],
    //Блог
    [
        'title' => 'Блог',
        'icon' => 'fa fa-rss',
        'pages' => [
            [
                'title' => 'Создать запись',
                'url' => route('admin.news.create'),
            ],

            [
                'title' => 'Управление',
                'url' => route('admin.news.info'),
            ],
        ]
    ],
    //Заказы нот
    [
        'title' => 'Заказы',
        'icon' => 'fa fa-shopping-cart',
        'url' => route('admin.shop-hist'),
    ],
    //Информация
    [
        'title' => 'Информация',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];