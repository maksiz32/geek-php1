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
    // [
    //     'title' => 'Практические работы',
    //     'uri' => '#',
    //     'subitems' => [
    //         [
    //             'title' => 'Практическая работа №3',
    //             'uri' => "/third"
    //         ],
    //         [
    //             'title' => 'Практическая работа №4',
    //             'uri' => "/fourth"
    //         ],
    //         [
    //             'title' => 'Практическая работа №5',
    //             'uri' => "/fifth"
    //         ],
    //         [
    //             'title' => 'Практическая работа №6',
    //             'uri' => "/sixth"
    //         ]
    //     ]
    // ],
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
                'uri' => "/edit-item",
                'role' => 'admin'
            ]
        ]
    ],
    [
        'title' => "Корзина (<span id='price'>".$countP."</span>)",
        'uri' => '/basket'
    ],
    [
        'title' => "Админка",
        'uri' => '#',
        'role' => 'admin',
        'subitems' => [
            [
                'title' => 'Все заказы',
                'uri' => "/allbuyers"
            ]
        ]
    ]
];
echo setMenu($nav, $username);
