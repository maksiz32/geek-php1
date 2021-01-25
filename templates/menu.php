<?php
    $nav = [
                [
                    'title' => 'Главная',
                    'uri' => '/',
                    'class' => ''
                ],
                [
                    [
                        'title' => 'Практическая работа №2',
                        'uri' => '?page=second',
                        'class' => ''
                    ],
                    [
                        'title' => 'Практическая работа №3',
                        'uri' => '?page=third',
                        'class' => ''
                    ]
                ]
    ];
    // var_dump($nav);
    // exit;
    function setMenu($arrMenu) {
        $strOut = '';
            foreach ($arrMenu as $key => $val) {
                if (is_array($key)) {
                    $strOut .= '<ul>' . setMenu($val) . '</ul>';
                } else {
                    $strOut .= "<li><a href=\"{$key['uri']}\" class=\"{$key['class']}\">{$key['title']}</a></li>";
                }
            }
        return $strOut;
    }
?>
    <?=setMenu($nav)?>
