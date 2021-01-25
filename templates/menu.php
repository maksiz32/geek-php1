<?php
    $nav = [
        'ul' => [
            '1' => [
                        'title' => 'Главная',
                        'uri' => '/',
                        'class' => ''
                ],
            '2' => [
                    'mainTitle' => 'Практические работы',
                    'ul' => [
                        '1' => [
                                'title' => 'Практическая работа №2',
                                'uri' => '?page=second',
                                'class' => ''
                            ],
                        '2' => [
                                'title' => 'Практическая работа №3',
                                'uri' => '?page=third',
                                'class' => ''
                            ]
                        ]
                ]
            ]
        ];
    function setMenu($arrMenu) {
        $strOut = '';
            foreach ($arrMenu as $key => $val) {
                if ($key == 'ul') {
                    (isset($arrMenu['mainTitle'])) ? $temp = $arrMenu['mainTitle'] : $temp ='';
                    return $temp . '<ul>' . setMenu($val) . '</ul>';
                } else if (isset($val['title'])) {
                    $strOut .= "<li><a href=\"{$val['uri']}\" class=\"{$val['class']}\">{$val['title']}</a></li>";
                } else if ($key != 'mainTitle') {
                    $strOut .= '<li>' . setMenu($val) . '</li>';
                }
            }
        return $strOut;
        }
    // echo setMenu($nav)
?>
<nav>
    <?=setMenu($nav)?>
</nav>