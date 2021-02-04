<?php
$nav = [
    [
        'title' => 'Главная',
        'uri' => '/'
    ],
    [
        'title' => 'Галерея',
        'uri' => '/gallery'
    ],
    [
        'title' => 'Практические работы',
        'uri' => '#',
        'subitems' => [
            [
                'title' => 'Практическая работа №3',
                'uri' => "/third"
            ],
            [
                'title' => 'Практическая работа №4',
                'uri' => "/fourth"
            ],
            [
                'title' => 'Практическая работа №5',
                'uri' => "/fifth"
            ],
            [
                'title' => 'Практическая работа №6',
                'uri' => "/sixth"
            ]
            ]
    ],
    [
        'title' => "Каталог",
        'uri' => '/products'
    ],
    [
        'title' => "Корзина ({$count})",
        'uri' => '#'
    ]
];

define('MENU', $nav);