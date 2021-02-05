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
            $params['pictures'] = getPictures();
            break;

        case 'edit-item':
            $params['page'] = implode('/', ['catalog', $url_array[1]]);
            if (!empty($_POST)) {
                if (!isset($url_array[2])) {
                    $params['message'] = getOneItem('create', null, ['name' => $_POST['name'], 'description' => $_POST['description'], 
                        'more_description' => $_POST['more_description'], 'price' => $_POST['price']]);//create
                    $id = lastId();
                    if (!empty($_FILES)) {
                        $total_files = count($_FILES['pics']['name']);
                        for($i = 0; $i < $total_files; $i++) {
                            $source[$i] = ['name' => $_FILES['pics']['name'][$i], 'type' => $_FILES['pics']['type'][$i], 'tmp_name' => $_FILES['pics']['tmp_name'][$i]];
                            $params['message'] = [uploadImg('/img/products/', $source[$i], 'pictures')];
                            $idPic = lastId();
                            addPicureIdItem($idPic, $id);
                        }
                    }
                } else {
                    //update
                }
            } else if (isset($url_array[2])) {
                if (!isset($url_array[3])) {
                    $id = (int) $url_array[2];//show
                    $params['item'] = getOneItem('read', $id)[0];
                    $params['noCrud'] = true;
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
