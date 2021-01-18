<?php
// №1.
    $a = 22;
    $b = -45;
    if ($a >= 0 && $b >= 0) {
        $first = $a - $b;
    }
    else if (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
        $first = $a + $b;
    }
    else {
        $first = $a * $b;
    }
// №2.
    $a = mt_rand(0, 15);
    switch ($a) {
        case 0:
            $second = $a . ', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 1:
            $second = $a . ', 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 2:
            $second = $a . ', 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 3:
            $second = $a . ', 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
            break;
        case 4:
            $second = $a . ', 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
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
        if ($pow !== 0) {
            return $val * power($val, $pow - 1);
        }
        return 1;
    }

    include 'first.php';
