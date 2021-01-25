<?php
    $nav = [
        'ul' => [
                    [
                        'title' => 'Главная',
                        'uri' => '/',
                        'class' => ''
                    ],
                    [
                        'ul' => [
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
                    ]
                ]
    ];
    function test($arr1) {
        foreach ($arr1 as $k => $v) {
            echo "K: {$k} :: \n\tvv: {$v}\n\t\t";
            if ($k == 'ul') {
                test($v);
            } else {
                echo "V: {$v}\n\t\t";
            }
        }
    }
    test($nav);
    var_dump($nav);
    exit;
    // function setMenu($arrMenu) {
    //     $strOut = '';
    //         foreach ($arrMenu as $key => $val) {
    //             if ($key == 'ul') {
    //                 return '<ul>' . setMenu($val) . '</ul>';
    //             } else {
    //                 $strOut .= "<li>";
    //                 ($val != 'ul') ? $strOut .= "<a href=\"".$key['title']."\" class=\"{$key['class']}\">{$key['uri']}</a>" : setMenu($val);
    //                 $strOut .= "</li>";
    //             }
    //         }
    //     return $strOut;
    // }
    // setMenu($nav)
?>
