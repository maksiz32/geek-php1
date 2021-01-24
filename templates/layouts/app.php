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
                display: flex;
            }
        </style>
    </head>
    <body>
        <?=$menu?>
        <?=$content?>
        <footer>
            <p>
                <?=$year?>
            </p>
        </footer>
    </body>
</html>
