<?php
#1
    $out1 = '';
    $i = 0;
    while ($i <= 100) {
        if ($i % 3 === 0) {
            $out1 .= $i . "<br>";
        }
        $i++;
    }
    // echo $out1;
#2
    $n = 0;
    $out2 = '';
    do {
        if ($n === 0) {
            $out2 .= $n ." - это ноль.<br>";
        } else {
            ($n % 2 === 0) ? $out2 .= $n . " - чётное число.<br>" : $out2 .= $n . " - нечётное число.<br>";
        }
        $n++;
    } while ($n <= 10);
    // echo $out2;
#3
    $arr3 = [
        'Московская область' => [
            'Москва', 'Зеленоград', 'Клин'
        ],
        'Ленинградская область' => [
            'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
        ],
        'Брянская область' => [
            'Брянск', 'Новозыбков', 'Клинцы', 'Жуковка', 'Комаричи'
        ],
        'Калужская область' => [
            'Калуга', 'Обнинск', 'Жиздра'
        ]
    ];
    function regionsRus($arr, $countV = 0) {
        $strOut3 = '';
        foreach ($arr as $key => $val) {
            $strOut3 .= "<strong>{$key}:</strong><br>";
            $strOut3 .= implode(', ', $val)."<br><br>";
        }
        return $strOut3;
    }
    // regionsRus($arr3);
#4
    function translite($strIn) {
        $alfabet = [
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'ts',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
            ];
        $res = strtr(mb_strtolower($strIn), $alfabet);
        return $res;
    }
    // translite('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку');
#5
    function spaceReplace($str) {
        return str_replace(" ", "_", $str);
    }
    // spaceReplace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку');
#7
    //for ($i = 0; $i <= 9; print $i++) {}
#8
    function regionsRusK($arr) {
        $strOut8 = '';
        foreach ($arr as $key => $val) {
            $arrVal = [];
            $strOut8 .= "<strong>{$key}:</strong><br>";
            for ($i = 0; $i < count($val); $i++) {
                if (mb_substr($val[$i], 0, 1) == "К")
                array_push($arrVal, $val[$i]);
            }
            $strOut8 .= implode(', ', $arrVal) . "<br><br>";
        }
        return $strOut8;
    }
    // regionsRusK($arr3);
#9
    function spaceTranslite($str) {
        return spaceReplace(translite($str));
    }
?>

<div class="main">
    <h1>Практическая работа №3</h1>
        <h2>Задание 1:</h2>
            <p>
                <?=$out1?>
            </p>
        <h2>Задание 2:</h2>
            <p>
                <?=$out2?>
            </p>
        <h2>Задание 3:</h2>
            <p>
                <?=regionsRus($arr3)?>
            </p>
        <h2>Задание 4:</h2>
            <p>
                <?=translite('Написать функцию, которая заменяет в строке кириллицу на латиницу')?>
            </p>
        <h2>Задание 5:</h2>
            <p>
                <?=spaceReplace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку')?>
            </p>
        <h2>Задание 6:</h2>
            <p>
                Реализовано
            </p>
        <h2>Задание 7:</h2>
            <p>
                <?php for ($i = 0; $i <= 9; print $i++) {}?>
            </p>
        <h2>Задание 8:</h2>
            <p>
                <?=regionsRusK($arr3)?>
            </p>
        <h2>Задание 9:</h2>
            <p>
                <?=spaceTranslite('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку')?>
            </p>
</div>