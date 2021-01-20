<?php
    $titlePage = 'Практическая работа 2';
// №1.
    $x = mt_rand(-50, 50);
    $y = mt_rand(-50, 50);
    if ($x >= 0 && $y >= 0) {
        $req = $x - $y;
        $first = 'Разность равна ' . $req;
    }
    else if (($x >= 0 && $y < 0) || ($x < 0 && $y >= 0)) {
        $req = $x + $y;
        $first = 'Сумма равна ' . $req;
    }
    else {
        $req = $x * $y;
        $first = 'Произведение равно ' . $req;
    }
// №2.
    $a2 = mt_rand(0, 15);

    function fifteen($fif) {
        if ($fif > 15) {
            return null;
        }
        return $fif . ' ' . fifteen($fif + 1);
    }

    switch ($a2) {
        case 0:
            $second = fifteen($a2);
            break;
        case 1:
            $second = fifteen($a2);
            break;
        case 2:
            $second = fifteen($a2);
            break;
        case 3:
            $second = fifteen($a2);
            break;
        case 4:
            $second = fifteen($a2);
            break;
        case 5:
            $second = fifteen($a2);
            break;
        case 6:
            $second = fifteen($a2);
            break;
        case 7:
            $second = fifteen($a2);
            break;
        case 8:
            $second = fifteen($a2);
            break;
        case 9:
            $second = fifteen($a2);
            break;
        case 10:
            $second = fifteen($a2);
            break;
        case 11:
            $second = fifteen($a2);
            break;
        case 12:
            $second = fifteen($a2);
            break;
        case 13:
            $second = fifteen($a2);
            break;
        case 14:
            $second = fifteen($a2);
            break;
        case 15:
            $second = fifteen($a2);
            break;
    }
// №3.
    function sum($a3, $b3) {
        return $a3 + $b3;
    }
    function minus($a3, $b3) {
        return $a3 - $b3;
    }
    function mult($a3, $b3) {
        return $a3 * $b3;
    }
    function del($a3, $b3) {
        ($b3 !== 0) ? $req3 = $a3 / $b3 : $req3 = 'Деление на ноль';
        return $req3;
    }
// №4.
    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case 'sum':
                return sum($arg1, $arg2) . ' - сумма ' . $arg1 . ' и ' . $arg2;
                break;
            case 'minus':
                return minus($arg1, $arg2) . ' - разность ' . $arg1 . ' и ' . $arg2;
                break;
            case 'mult':
                return mult($arg1, $arg2) . ' - произведение ' . $arg1 . ' и ' . $arg2;
                break;
            case 'del':
                return del($arg1, $arg2) . ' - частное ' . $arg1 . ' и ' . $arg2;
                break;
            default:
                return 'Данная функция неопределена';
        }
    }
// №5.    
    $year = date('Y') . " год";
// №6.
    function power($val, $pow) {
        if ($pow < 0) {
            return power(1 / $val, Abs($pow));
        }
        else if ($pow > 0) {
            return $val * power($val, $pow - 1);
        }
        else {
            return 1;
        }
    }
// №7.
    function ruTime($inpT, $what) {
        $exp = '';
        if ($inpT >= 10 && $inpT < 20 ) {
            ($what === 'h') ? $exp = 'часов' : $exp = 'минут';
            $outT = "{$inpT} {$exp}";
        } else {
            $mod = $inpT % 10;
            switch ($mod) {
                case 1:
                    ($what === 'h') ? $exp = 'час' : $exp = 'минута';
                    $outT = "{$inpT} {$exp}";
                case 2:
                case 3:
                case 4:
                    ($what === 'h') ? $exp = 'часа' : $exp = 'минуты';
                    $outT = "{$inpT} {$exp}";
                default:
                    ($what === 'h') ? $exp = 'часов' : $exp = 'минут';
                    $outT = "{$inpT} {$exp}";
            }
        }
        return $outT;
    }
        $currientTime = explode(":", date('g:i'));
        $currH = ruTime($currientTime[0], 'h');//h - час
        $currM = ruTime($currientTime[1], 'm');//m - минута
    /*
    0 часов минут       10 часов минут      20 часов минут    30 минут      40 минут    50 минут
    1 час   минута      11 часов минут      21 час   минута   31 минута     41 минута   51 минута
    2 часа  минуты      12 часов минут      22 часа  минуты   32 минуты     42 минуты   52 минуты
    3 часа  минуты      13 часов минут      23 часа  минуты   33 минуты     43 минуты   53 минуты
    4 часа  минуты      14 часов минут      24 часа  минуты   34 минуты     44 минуты   54 минуты
    5 часов минут       15 часов минут      25       минут    35 минут      45 минут    55 минут
    6 часов минут       16 часов минут      26       минут    36 минут      46 минут    56 минут
    7 часов минут       17 часов минут      27       минут    37 минут      47 минут    57 минут
    8 часов минут       18 часов минут      28       минут    38 минут      48 минут    58 минут
    9 часов минут       19 часов минут      29       минут    39 минут      49 минут    59 минут
    
    - Все ЧАСОВ МИНУТ
    - $g & $i % 10 == 1 (час минута) кроме в диапазоне 10-19
    - $g & $i % 10 == 2 || 3 || 4 (часа минуты) кроме в диапазоне 10-19
    
    */
    // Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты

    include 'first.php';
