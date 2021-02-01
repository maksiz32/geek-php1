<?php

//Для каждой страницы готовим массив со своим набором переменных
function prepareVariables($url_array) {
    
    if ($url_array[1] == "") {
        $page = 'index';
    } else {
        $page = $url_array[1];
    }

    //Можно менять шаблон под разные страницы, передавая разное значение этого параметра в CASE(ах)
    $params['layout'] = 'app';
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
            $params['page'] = implode('/', [$url_array[1], $url_array[2]]);
            break;

        // case 'apicatalog':
        //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        //     die();
    }
    return $params;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
//переменная $year для футера
function render($page, $params) {
    $year = date('Y');
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'year' => $year
    ]);
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = []) {
    if ($params) {
        extract($params);
    }
//    foreach ($params as $key => $value) {
//        $$key = $value;
//    }
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }
    return ob_get_clean();
}