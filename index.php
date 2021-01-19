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
    $currientTime = explode(":", date('H:i'));
// Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут, 21 час 43 минуты
    include 'first.php';
