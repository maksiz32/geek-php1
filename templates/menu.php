<?php
// $separator = DIRECTORY_SEPARATOR;
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

    $strOut = "<ul>";
    $strOut .= setMenu($nav);
    $strOut .= "</ul>";

    echo $strOut;

    function setMenu($arrMenu) {
        $strOut = '';
            foreach ($arrMenu as $key) {
                $strOut .= "<li><a href=\"{$key['uri']}\">{$key['title']}</a>";
                if (isset($key['subitems'])) {
                    $strOut .= "<ul>";
                    $strOut .= setMenu($key['subitems']);
                    $strOut .= "</ul>";
                }
                $strOut .= "</li>";
            }
        return $strOut;
    }