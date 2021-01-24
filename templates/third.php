<?php
#1
    $i = 0;
    while ($i++ <= 100) {
        if ($i % 3 === 0) {
            echo $i . "<br>";
        }
    }
#2
    $n = 0;
    $str = '';
    do {
        if ($n === 0) {
            $str .= $n ." - это ноль.<br>";
        } else {
            ($n % 2 === 0) ? $str .= $n . " - чётное число.<br>" : $str .= $n . " - нечётное число.<br>";
        }
    } while (++$n <= 10);
    echo $str;
#3
    $arr3 = [
        'Московская область' => [
            'Москва', 'Зеленоград', 'Клин'
        ],
        'Ленинградская область' => [
            'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
        ],
        'Брянская область' => [
            'Брянск', 'Новозыбков', 'Клинцы', 'Жуковка'
        ],
        'Калужская область' => [
            'Калуга', 'Обнинск', 'Жиздра'
        ]
    ];
    function regionsRus($arr, $countV = 0) {
        foreach ($arr as $key => $val) {
            if (!is_int($key)){
                echo "{$key}:<br>";
            }
                if (is_array($val)) {
                    $count = count($val);
                    regionsRus($val, $count);
                } else {
                    echo $val;
                    if (--$countV > 0) {
                        echo ', ';
                    } else {
                        echo '<br>';
                    }
                }
        }
    }
    regionsRus($arr3);
#4
    function translite($str) {
        $alfabet = [
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
            ];
        $strOut = '';
        $lowCase = false;
        $len = mb_strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $st = mb_substr($str, $i, 1);
            if ($st === mb_strtoupper($st)) {
                $lowCase = true;
            }
            ($lowCase) ? $strOut .= mb_strtoupper($alfabet[mb_strtolower($st)]) : $strOut .= $alfabet[$st];
            $lowCase = false;
        }
        echo $strOut;
    }
    translite('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку');
#5
    function spaceReplace($str) {
        echo str_replace(" ", "_", $str);
    }
    spaceReplace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку');
    /*
    6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать. ПОПРОБОВАТЬ СДЕЛАТЬ ЧЕРЕЗ ШАБЛОН. Реализация подменю (меню в меню)
    */
#7
    for ($i = 0; $i < 10; print $i++) {}
#8
    function regionsRusK($arr, $countV = 0) {
        foreach ($arr as $key => $val) {
            if (!is_int($key)){
                echo "{$key}:<br>";
            }
                if (is_array($val)) {
                    $count = count($val);
                    regionsRusK($val, $count);
                } else if (mb_strtoupper(mb_substr($val, 0, 1)) == 'К') {
                    echo $val;
                    if (--$countV > 0) {
                        echo ', ';
                    } else {
                        echo '<br>';
                    }
                }
        }
    }
    regionsRusK($arr3);
#9
function doSlug($str) {
    $alfabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya', ' ' => '_'
        ];
    $strOut = '';
    $lowCase = false;
    $len = mb_strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $st = mb_substr($str, $i, 1);
        if ($st === mb_strtoupper($st)) {
            $lowCase = true;
        }
        ($lowCase) ? $strOut .= mb_strtoupper($alfabet[mb_strtolower($st)]) : $strOut .= $alfabet[$st];
        $lowCase = false;
    }
    echo $strOut;
}
doSlug('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку');
?>

<div class="main">
    <h1>Практическая работа №3</h1>
<!--     
        <h2>Задание 1:</h2>
            <p>
                A = <?=$x?>, B = <?=$y?>
            </p>
            <p>
                <?=$first?>
            </p>
        <h2>Задание 2:</h2>
            <p>
                <?=$second?>
            </p>
        <h2>Задание 3:</h2>
            <p>
                Сумма <?=$a3 = 55?> и <?=$b3 = 82?> равна <strong><?=sum($a3, $b3)?></strong>
            </p>
            <p>
                Разность <?=$a3 = 55?> и <?=$b3 = 82?> равна <strong><?=minus($a3, $b3)?></strong>
            </p>
            <p>
                Произведение <?=$a3 = 55?> и <?=$b3 = 82?> равно <strong><?=mult($a3, $b3)?></strong>
            </p>
            <p>
                Частное <?=$a3 = 55?> и <?=$b3 = 0?> равно <strong><?=del($a3, $b3)?></strong>
            </p>
        <h2>Задание 4:</h2>
            <p>
                <?=mathOperation(203, -5, 'minus')?>
            </p>
        <h2>Задание 5:</h2>
            <p>
                <a href="./index.php">По ссылке</a>
            </p>
        <h2>Задание 6:</h2>
            <p>
                Возведение числа <?=$a2 = 2?> в степень <?=$b2 = -3?> равно <strong><?=power($a2, $b2)?></strong>
            </p>
        <h2>Задание 7:</h2>
            <p>
                Текущее время: <strong><?=$currH?> <?=$currM?> <?=$currS?></strong>
            </p> -->
</div>