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
        'title' => "Товары",
        'uri' => '#',
        'subitems' => [
            [
                'title' => 'Каталог',
                'uri' => "/products"
            ],
            [
                'title' => 'Добавить в каталог',
                'uri' => "/edit-item"
            ]
        ]
    ],
    [
        'title' => "Корзина ({$countP})",
        'uri' => '/basket'
    ],
    [
        'title' => "Админка",
        'uri' => '#',
        'subitems' => [
            [
                'title' => 'Все заказы',
                'uri' => "/allbuyers"
            ]
        ]
    ]
];

define('MENU', $nav);