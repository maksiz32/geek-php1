<?php
//Для каждой страницы готовим массив со своим набором переменных
function prepareVariables($url_array) {
    
    if ($url_array[1] == "") {
        $params['page'] = 'index';
    } else {
        $params['page'] = $url_array[1];
    }

    //Можно менять шаблон под разные страницы, передавая разное значение этого параметра в CASE(ах)
    $params['layout'] = 'app';
    switch ($params['page']) {
        case 'gallery':
            $params['page'] = implode('/', ['galleries', $url_array[1]]);
            if (!empty($_FILES)) {
                uploadImg('/img/gallery/');
            }
            //Удаление и изменение здесь может выполнить любой пользователь
            if (count($url_array) >= 3) {
                $action = $url_array[count($url_array) - 2];
                $id = (int) $url_array[count($url_array) - 1];
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
            $params['page'] = implode('/', ['galleries', $url_array[1]]);
            $id = (int) $url_array[2];
            $params['pic'] = getOnePic($id);
            break;

        // case 'second':
        //     $params['page'] = implode('/', ['exersices', $url_array[1]]);
        //     break;
        case 'third':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            break;
        case 'fourth':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            break;
        case 'fifth':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            break;
        case 'sixth':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            if (!empty($_POST)) {
                $argF = $_POST['argF'];
                $argS = $_POST['argS'];
                $operation = $_POST['operation'];
                $summa = mathOperation($argF, $argS, $operation);
                $p = compact('argF', 'argS', 'operation', 'summa');
                $params = array_merge($params, $p);
            }
            break;

        case 'products':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            $params['products'] = getProducts();
            break;

        case 'edit-item':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            if (!empty($_POST)) {
                if (!isset($url_array[2])) {
                    //create
                    $id = lastId();
                } else {
                    //update
                }
            } else if (isset($url_array[2])) {
                if (!isset($url_array[3])) {
                    $id = (int) $url_array[2];//
                    $params['item'] = getOneItem('read', $id)[0];
                } else {
                    //delete
                }
            }
            break;

        // case 'apicatalog':
        //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        //     die();
    }
    return $params;
}
