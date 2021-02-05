<?php
//Подключение файла с настройками движка
include "../config/config.php";
$url_array = explode('/', $_SERVER['REQUEST_URI']);

$params = prepareVariables($url_array);
if (isset($params['page'])) {
    $page = $params['page'];
    unset($params['page']);
}

echo render($page, $params);
