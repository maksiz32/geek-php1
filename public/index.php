<?php
//Запускаю сессию
if (session_status() !== 2) {
    session_start();
}
//Подключение файла с настройками движка
include "../config/config.php";
$url_array = explode('/', $_SERVER['REQUEST_URI']);

$params = prepareVariables($url_array);
if (isset($params['page'])) {
    $page = $params['page'];
    unset($params['page']);
}

//$params['username'] = hasUser($_SESSION['username']);
$params['username'] = hasUser($_SESSION['username'])['username'];

echo render($page, $params);
