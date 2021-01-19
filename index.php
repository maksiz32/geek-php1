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
            return true;
        }
        return $fif . ' ' . fifteen($fif + 1);
    }
    switch ($a2) {
        case 0:
            for (; $a <= 15; $a++) {
                $second .= $a . ' ';
            }
            break;
        case 1:
            for (; $a <= 15; $a++) {
                $second .= $a . ' ';
            }
            break;
        case 2:
            for (; $a <= 15; $a++) {
                $second .= $a . ' ';
            }
            break;
        case 3:
            for (; $a <= 15; $a++) {
                $second .= $a . ' ';
            }
            break;
        case 4:
            for (; $a <= 15; $a++) {
                $second .= $a . ' ';
            }
            break;
        case 5:
            $second = $a . ', 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 6:
            $second = $a . ', 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 7:
            $second = $a . ', 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 8:
            $second = $a . ', 9, 10, 11, 12, 13, 14, 15';
            break;
        case 9:
            $second = $a . ', 10, 11, 12, 13, 14, 15';
            break;
        case 10:
            $second = $a . ', 11, 12, 13, 14, 15';
            break;
        case 11:
            $second = $a . ', 12, 13, 14, 15';
            break;
        case 12:
            $second = $a . ', 13, 14, 15';
            break;
        case 13:
            $second = $a . ', 13, 14, 15';
            break;
        case 14:
            $second = $a . ', 15';
            break;
        case 15:
            $second = $a;
            break;
    }
// №3.
    function sum($a1, $b1) {
        return $a1 + $b1;
    }
    function minus($a1, $b1) {
        return $a1 - $b1;
    }
    function mult($a1, $b1) {
        return $a1 * $b1;
    }
    function del($a1, $b1) {
        if ($b1 !== 0) {
            return $a1 / $b1;
        } else {
            return 'Деление на ноль';
        }
    }
// №4.
    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case 'sum':
                return sum($arg1, $arg2);
                break;
            case 'minus':
                return minus($arg1, $arg2);
                break;
            case 'mult':
                return mult($arg1, $arg2);
                break;
            case 'del':
                return del($arg1, $arg2);
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
    $currientTime = explode(":", date('H:i'));
// Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты
    include 'first.php';
