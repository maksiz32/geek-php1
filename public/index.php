<?php

//Подключение файла с настройками движка
include "../config/config.php";

//Читаем параметр page из uri, чтобы определить, на какую страницу переходит пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
// $params = [
//     'count' => 2
// ];
switch ($page) {

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        if (!empty($_FILES)) {
            upload();
        }
        $params['images'] = getGallery();
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

//_log($params, "render");
echo render($page, $params);
