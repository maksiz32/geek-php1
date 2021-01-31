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
$params = [
    'count' => 2
];
switch ($page) {

    // case 'catalog':
    //     $params['catalog'] = getCatalog();
    //     break;

    case 'gallery':
        $site_gallery = DIR_ROOT . '/img/gallery';
        if (!empty($_FILES)) {
            uploadImg();
        }
        //Коды ошибок при загрузке файлов
        $messages = [
            'ok' => 'Файл заружен',
            'error' => 'Ошибка загрузки',
            'nonSize' => 'Файл не должен быть больше 5Мб',
            'nonMime' => 'Можно загружать только изображения'
        ];
        $params['message'] = $messages[$_GET['message']];
        $params['images'] = getGallery($site_gallery);
        break;

    // case 'apicatalog':
    //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
    //     die();
}

//_log($params, "render");
echo render($page, $params);
