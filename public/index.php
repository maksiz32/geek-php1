<?php
//Подключение файла с настройками движка
include "../config/config.php";

$urlArray = explode('/', $_SERVER['REQUEST_URI']);
$url_array['main_page'] = $urlArray[1];

switch ($url_array['main_page']) {
    case 'gallery':
        if (count($urlArray) >= 3) {
            $url_array['action'] = $urlArray[2];
            $url_array['id'] = (int) $urlArray[3];
        }
        break;
    case 'basket':
        if (isset($urlArray[2])) {
            $url_array['session_id'] = $urlArray[2];
        }
        break;
    case 'onepic':
        $url_array['picture_id'] = $urlArray[2];
        break;
    case 'item':
        $url_array['product_id'] = (int) $urlArray[2];
        if (isset($urlArray[4])) {
            $url_array['feed_action'] = $urlArray[3];
            $url_array['feedback_id'] = $urlArray[4];
        }
        break;
    case 'edit-item':
        if (isset($urlArray[2])) {
            $url_array['id'] = (int) $urlArray[2];
        }
        break;
    case 'basket':
        if (isset($urlArray[2])) {
            $url_array['session_id'] = $urlArray[2];
        }
        break;
    case 'delbask':
        $url_array['basket_id'] = $urlArray[2];
        $url_array['basket_session_id'] = $urlArray[3];
        break;
    case 'apilike':
        $url_array['like_id'] = (int) $urlArray[2];
        break;
    case 'apibasket':
        $url_array['id'] = (int) $urlArray[2];
        $url_array['price'] = (int) $urlArray[3];
        break;
    case 'apistat':
        $url_array['id'] = (int) $urlArray[2];
        $url_array['status'] = (int) $urlArray[3];
        break;
}

//Запускаю сессию
if (session_status() !== 2) {
    session_start();
}

$params = prepareVariables($url_array);
if (isset($params['page'])) {
    $page = $params['page'];
    unset($params['page']);
}

echo render($page, $params);
