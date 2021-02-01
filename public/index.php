<?php
//Подключение файла с настройками движка
include "../config/config.php";
$url_array = explode('/', $_SERVER['REQUEST_URI']);

    //Читаем параметр page из uri, чтобы определить, на какую страницу переходит пользователь, по умолчанию это будет index
    if ($url_array[1] == "") {
        $page = 'index';
    } else {
        $page = $url_array[1];
    }
$params = prepareVariables($url_array);
if (isset($params['page'])) {
    $page = $params['page'];
    unset($params['page']);
}

echo render($page, $params);
