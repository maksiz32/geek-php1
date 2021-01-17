<?php 
    $year = "2021 год";
    $page_title = "Практическая работа";
    $paragraf_title = "Задание Урок №1";
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?= $page_title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><?= $paragraf_title ?></h1>
        <ol start="3">
            <li>
                <pre>
    $a = 5; //Integer
    $b = '05'; //String
    var_dump($a == $b);         // Почему true? - Потому что используется нестрогое сравнение значений без сравнения типов - 5==5
    var_dump((int)'012345');     // Почему 12345? Строка преобразуется в число, а в типе INT нет ведущего нуля.
    var_dump((float)123.0 === (int)123.0); // Почему false? - Потому что === это операция строгого сравнения, т.е. типы переменных должны совпадать тоже
    var_dump((int)0 === (int)'hello, world'); // Почему true? Потому что при попытке преобразовать строку в число PHP потерпит неудачу и присвоит ответу 0. В сравнении будут числа 0===0
                </pre>
            </li>
            <li>
                Текущий год - <?= $year ?>
            </li>
            <li>
                <pre>
    $a = 1;
    $b = 2;
                    <?php
                        $a = 1;
                        $b = 2;
                    ?>
                    <?="\n\tA = {$a}, B = $b<br><br>";?>
    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;
                    <?php
                        $a = $a + $b;
                        $b = $a - $b;
                        $a = $a - $b;
                    ?>
                    <?="\n\tA = {$a}, B = $b";?>
                </pre>
            </li>
        </ol>
    </body>
</html>
