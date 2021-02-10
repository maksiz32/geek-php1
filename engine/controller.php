<?php
//Для каждой страницы готовим массив со своим набором переменных

function prepareVariables($url_array) {
    
    if ($url_array[1] == "") {
        $params['page'] = 'index';
    } else {
        $params['page'] = $url_array[1];
    }

    $params['countP'] = countInBasket(session_id());

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
                $argF = (float) strip_tags($_POST['argF']);
                $argS = (float) strip_tags($_POST['argS']);
                $operation = $_POST['operation'];
                $summa = mathOperation($argF, $argS, $operation);
                $p = compact('argF', 'argS', 'operation', 'summa');
                $params = array_merge($params, $p);
            } else if (!empty($_POST) && isset($_POST['argF1'])) {
                $arr1 = ['argF1', 'argS1'];
                $argF1 = (float) strip_tags($_POST['argF1']);
                $argS1 = (float) strip_tags($_POST['argS1']);
                foreach($_POST as $key => $val) {
                    if(!in_array($key, $arr1)) $operation1 = $key;
                }
                $summa1 = mathOperation($argF1, $argS1, $operation1);
                $p = compact('argF1', 'argS1', 'operation1', 'summa1');
                $params = array_merge($params, $p);
            }
            break;

        case 'products':
            // session_start();
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
            if (!empty($_POST) || !empty($_FILES)) {
                $editArr = doActionItems($_POST, $_FILES, $url_array);
                $params = array_merge($params, $editArr);
            }
            break;
        
        // case 'apicalc':
            // $res = file_get_contents('php://input');
            // $res1 = json_decode($res, true);
            // _log($res1, "res-json");
            // $op1 = (int) $res1->op1;
            // $op2 = (int) $res1->op2;
            // $opType = $res1->sum;
            // $res['result'] = mathOperation($op1, $op2, $opType);
            // header('Content-Type: application/json');
            // echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            // die();

        case 'buy':
            session_start();
            $sessionId = session_id();
            $productId = (int) $_POST['id'];
            setBasket($productId, $sessionId);
            header('Location: /products');
            break;

        case 'basket':
            $params['page'] = implode('/', ['basket', $url_array[1]]);
            session_start();
            $sessionId = session_id();
            $params['products'] = allProductsBySessionId($sessionId);
            break;

        case 'delbask':
            // $params['page'] = implode('/', ['basket', $url_array[1]]);
            $baskId = $url_array[2];
            delFromBaskById($baskId);
            header('Location: /basket');
            die();
        case 'submbuy':
            $params['page'] = implode('/', ['basket', $url_array[1]]);
            break;
        case 'buyall':
            session_start();
            $sessionId = session_id();
            subBuy($sessionId, $_POST['phone']);
            session_regenerate_id();
            header('Location: /');
            die();
        case 'allbuyers':
            if (is_admin($_SESSION['username'])) {
                $params['page'] = implode('/', ['admin', $url_array[1]]);
                session_start();
                $sessionId = session_id();
                $params['phones'] = getPhone();
                break;
            } else {
                header('Location: /');
                die();
            }

        case 'register':
            $params['layout'] = 'noregistration';
            break;
        case 'reg':
            $res = registration($_POST);
            if ($res[0]) {
                session_start();
                $_SESSION['username'] = $res[1];
                header('Location: /');
                die();
            }//Добавить обработку ошибок регистрации
            break;

        case "logout":
            session_destroy();
            header('Location: /');
            die();

        case "auth":
            if (validateUser($_POST['username'], $_POST['password'])) {
                session_start();
                $_SESSION['username'] = secUser($_POST['username']);
                header('Location: /');
                die();
            }
            break;

        // case 'apicatalog':
        //     echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        //     die();
    }
    return $params;
}
