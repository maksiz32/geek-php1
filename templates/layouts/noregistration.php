<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?=$titlePage?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/main.css">
        <script src="/js/jquery.min.js"></script>
    </head>
    <body>
        <nav>
            <?=$menu?>
        </nav>
            <?=$content?>
        <footer>
            <div class="year">
                <?=$year?>
            </div>
        </footer>
    </body>
</html>
