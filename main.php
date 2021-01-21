<?php
    $titlePage = 'Практическая работа 2';
// №1.
    $x = mt_rand(-50, 50);
    $y = mt_rand(-50, 50);
    if ($x >= 0 && $y >= 0) {
        $req = $x - $y;
        $first = 'Разность равна ' . $req;
    }
    else if ($x < 0 && $y < 0) {
        $req = $x * $y;
        $first = 'Произведение равно ' . $req;
    }
    else {
        $req = $x + $y;
        $first = 'Сумма равна ' . $req;
    }
// №2.
    $a2 = mt_rand(0, 15);

    function fifteen($fif) {
        if ($fif > 15) {
            return null;
        }
        return $fif . ' ' . fifteen($fif + 1);
    }
    $second = fifteen($a2);
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
        return ($b3 !== 0) ? $a3 / $b3 : 'Деление на ноль';
    }
// №4.
    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case 'sum':
                return sum($arg1, $arg2) . ' - сумма ' . $arg1 . ' и ' . $arg2;
            case 'minus':
                return minus($arg1, $arg2) . ' - разность ' . $arg1 . ' и ' . $arg2;
            case 'mult':
                return mult($arg1, $arg2) . ' - произведение ' . $arg1 . ' и ' . $arg2;
            case 'del':
                return del($arg1, $arg2) . ' - частное ' . $arg1 . ' и ' . $arg2;
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
        $exp = [
            'h' => 'час',
            'm' => 'минут',
            's' => 'секунд'
        ];
        $endDef = [
            'h' => 'ов',
            'm' => '',
            's' => ''
        ];
        $end1 = [
            'h' => '',
            'm' => 'а',
            's' => 'а'
        ];
        $end2 = [
            'h' => 'а',
            'm' => 'ы',
            's' => 'ы'
        ];
        //
        if ($inpT >= 10 && $inpT < 20 ) {
            $outT = "{$inpT} {$exp[$what]}{$endDef[$what]}";
        } else {
            $mod = $inpT % 10;
            switch ($mod) {
                case 1:
                    $outT = "{$inpT} {$exp[$what]}{$end1[$what]}";
                    break;
                case 2:
                case 3:
                case 4:
                    $outT = "{$inpT} {$exp[$what]}{$end2[$what]}";
                    break;
                default:
                    $outT = "{$inpT} {$exp[$what]}{$endDef[$what]}";
            }
        }
        return $outT;
    }
        $currientTime = explode(":", date('g:i:s'));
        $currH = ruTime($currientTime[0], 'h');//h - час
        $currM = ruTime($currientTime[1], 'm');//m - минута
        $currS = ruTime($currientTime[2], 's');//s - секунда
    
    include 'first.php';
