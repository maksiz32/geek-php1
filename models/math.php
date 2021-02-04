<?php
    function sum($a, $b) {
        return $a + $b;
    }
    function minus($a, $b) {
        return $a - $b;
    }
    function mult($a, $b) {
        return $a * $b;
    }
    function del($a, $b) {
        return ($b != 0) ? $a / $b : 'Деление на ноль';
    }

    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case 'sum':
                return sum($arg1, $arg2);
            case 'minus':
                return minus($arg1, $arg2);
            case 'mult':
                return mult($arg1, $arg2);
            case 'del':
                return del($arg1, $arg2);
            default:
                return 'Функция неопределена';
        }
    }