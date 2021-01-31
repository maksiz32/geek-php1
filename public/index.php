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

//Для каждой страницы готовим массив со своим набором переменных
$params = [
    'count' => 2
];
switch ($page) {

    case 'gallery':
        if (!empty($_FILES)) {
            uploadImg();
        }

        //Удаление и изменение здесь может выполнить любой пользователь
        if (count($url_array) > 3) {
            $action = $url_array[count($url_array) - 2];
            $id = $url_array[count($url_array) - 1];
            $action($id);
        }
        //Коды ошибок при загрузке файлов
        $messages = [
            'ok' => 'Файл заружен',
            'error' => 'Ошибка загрузки',
            'nonSize' => 'Файл не должен быть больше 5Мб',
            'nonMime' => 'Можно загружать только изображения'
        ];
        $params['message'] = $messages[$_GET['message']];
        $params['images'] = getGallery();
        break;

    case 'onepic':
        // $id = (int)$_GET['id'];
        $id = $url_array[2];
        $params['pic'] = getOnePic($id);
        break;
        
    case 'exersices':
        $page = implode('/', [$url_array[1], $url_array[2]]);
        break;

    // case 'apicatalog':
    //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
    //     die();
}

//_log($params, "render");
echo render($page, $params);
