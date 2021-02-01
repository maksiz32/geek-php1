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
                'title' => 'Практическая работа №2',
                'uri' => "/exersices/second"
            ],
            [
                'title' => 'Практическая работа №3',
                'uri' => "/exersices/third"
            ],
            [
                'title' => 'Практическая работа №4',
                'uri' => "/exersices/fourth"
            ],
            [
                'title' => 'Практическая работа №5',
                'uri' => "/exersices/fifth"
            ]
            ]
    ],
    [
        'title' => "Корзина ({$count})",
        'uri' => '#'
    ]
];

define('MENU', $nav);