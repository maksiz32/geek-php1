<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Практическая работа 2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Практическая работа №2</h1>
            <h2>Задание 1:</h2>
                <p>
                    <?=$first?>
                </p>
            <h2>Задание 2:</h2>
                <p>
                    <?=$second?>
                </p>
            <h2>Задание 3:</h2>
                <p>
                    Сумма <?=$a1 = 55?> и <?=$b1 = 82?> равна <strong><?=sum($a1, $b1)?></strong>
                </p>
                <p>
                    Разность <?=$a1 = 55?> и <?=$b1 = 82?> равна <strong><?=minus($a1, $b1)?></strong>
                </p>
                <p>
                    Произведение <?=$a1 = 55?> и <?=$b1 = 82?> равно <strong><?=mult($a1, $b1)?></strong>
                </p>
                <p>
                    Частное <?=$a1 = 55?> и <?=$b1 = 82?> равно <strong><?=del($a1, $b1)?></strong>
                </p>
            <h2>Задание 4:</h2>
                <p>
                    <?=mathOperation(203, -5, 'del')?>
                </p>
            <h2>Задание 6:</h2>
                <p>
                    Возведение числа <?=$a2 = 2?> в степень <?=$b2 = -3?> равно <strong><?=power($a2, $b2)?></strong>
                </p>
        <footer style="text-align: center; background-color: grey; color: white; height: 10vh; white-space: pre-line;">
            <?=$year?>
        </footer>
    </body>
</html>
