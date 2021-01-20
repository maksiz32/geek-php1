<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?=$titlePage?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            body {
                display: flex;
                flex-direction: column;
            }
            .main {
                flex-grow: 1;
                width: 98vw;
                margin: 0 auto;
            }
            h1, h2, footer {
                margin-top: 15px;
            }
            footer {
                text-align: center;
                background-color: grey;
                color: white;
                height: 10vh;
                white-space: pre-line;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <h1>Практическая работа №2</h1>
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
                        Частное <?=$a3 = 55?> и <?=$b3 = 82?> равно <strong><?=del($a3, $b3)?></strong>
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
                        Текущее время: <strong><?=$currH?> <?=$currM?></strong>
                    </p>
        </div>
        <footer>
            <p>
                <?=$year?>
            </p>
        </footer>
    </body>
</html>
