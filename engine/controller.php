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
                $params['message'] = uploadImg('/img/gallery/', $_FILES['myfile'], 'gallery');
            }
            //Удаление и изменение здесь может выполнить любой пользователь
            if (count($url_array) >= 3) {
                $action = $url_array[count($url_array) - 2];
                $id = (int) $url_array[count($url_array) - 1];
                $action($id);
            }
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
        case 'fourth':
        case 'fifth':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            break;
        case 'sixth':
            $params['page'] = implode('/', ['exersices', $url_array[1]]);
            if (!empty($_POST) && isset($_POST['argF'])) {
                $argF = (int) $_POST['argF'];
                $argS = (int) $_POST['argS'];
                $operation = $_POST['operation'];
                $summa = mathOperation($argF, $argS, $operation);
                $p = compact('argF', 'argS', 'operation', 'summa');
                $params = array_merge($params, $p);
            } else if (!empty($_POST) && isset($_POST['argF1'])) {
                $arr1 = ['argF1', 'argS1'];
                $argF1 = (int) $_POST['argF1'];
                $argS1 = (int) $_POST['argS1'];
                foreach($_POST as $key => $val) {
                    if(!in_array($key, $arr1)) $operation1 = $key;
                }
                $summa1 = mathOperation($argF1, $argS1, $operation1);
                $p = compact('argF1', 'argS1', 'operation1', 'summa1');
                $params = array_merge($params, $p);
            }
            break;

        case 'products':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            $params['products'] = getProducts();
            $params['pictures'] = getPictures();
            break;

        case 'item':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            if (isset($url_array[4])) {
                $action = $url_array[3];
                $idFeed = (int) $url_array[4];
            }
            if (!empty($_POST) && empty($_POST['id'])) {
                addFeedback($_POST);
            } else if (!empty($_POST)) {
                editFeedback($_POST);
            }
            if ($action == 'edit') {
                $params['feed'] = getFeed($idFeed);
            }
            if ($action == 'delete') {
                delFeed($idFeed);
            }
            if (isset($url_array[2])) {
                $id = (int) $url_array[2];
                $params['item'] = getOneItem('read', $id);
                $params['feedbacks'] = getFeedbacksById($id);
                $params['pics'] = getPicturesByProdId($id);
            }
            break;

        case 'edit-item':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            $editArr = doActionItems($_POST, $_FILES, $url_array);
            $params = array_merge($params, $editArr);
            break;

        // case 'apicatalog':
        //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        //     die();
    }
    return $params;
}
