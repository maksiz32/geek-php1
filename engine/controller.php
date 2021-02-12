<?php
//Для каждой страницы готовим массив со своим набором переменных

function prepareVariables($url_array) {
    
    if ($url_array['main_page'] == "") {
        $params['page'] = 'index';
    } else {
        $params['page'] = $url_array['main_page'];
    }

    $params['countP'] = countInBasket(session_id());
    $params['username'] = hasUser($_SESSION['username'])['username'];

    //Можно менять шаблон под разные страницы, передавая разное значение этого параметра в CASE(ах)
    $params['layout'] = 'app';
    switch ($params['page']) {
        case 'gallery':
            $params['page'] = implode('/', ['galleries', $url_array['main_page']]);
            if (!empty($_FILES)) {
                $params['message'] = uploadImg('/img/gallery/', 'gallery');
            }
            $params['images'] = getGallery();
            //Удаление и изменение здесь может выполнить любой пользователь
            if (count($url_array) >= 3) {
                $action = $url_array['action'];
                $id = (int) $url_array['id'];
                $action($id);
            header('Location: /gallery');
            die();
            }
            break;

        case 'onepic':
            $params['page'] = implode('/', ['galleries', $url_array['main_page']]);
            $id = (int) $url_array['picture_id'];
            addLikes($id);
            $params['pic'] = getOnePic($id);
            break;

        // case 'third':
        // case 'fourth':
        // case 'fifth':
        //     $params['page'] = implode('/', ['exersices', $url_array[1]]);
        //     break;
        // case 'sixth':
        //     $params['page'] = implode('/', ['exersices', $url_array[1]]);
        //     if (!empty($_POST) && isset($_POST['argF'])) {
        //         $argF = (float) strip_tags($_POST['argF']);
        //         $argS = (float) strip_tags($_POST['argS']);
        //         $operation = $_POST['operation'];
        //         $summa = mathOperation($argF, $argS, $operation);
        //         $p = compact('argF', 'argS', 'operation', 'summa');
        //         $params = array_merge($params, $p);
        //     } else if (!empty($_POST) && isset($_POST['argF1'])) {
        //         $arr1 = ['argF1', 'argS1'];
        //         $argF1 = (float) strip_tags($_POST['argF1']);
        //         $argS1 = (float) strip_tags($_POST['argS1']);
        //         foreach($_POST as $key => $val) {
        //             if(!in_array($key, $arr1)) $operation1 = $key;
        //         }
        //         $summa1 = mathOperation($argF1, $argS1, $operation1);
        //         $p = compact('argF1', 'argS1', 'operation1', 'summa1');
        //         $params = array_merge($params, $p);
        //     }
        //     break;

        case 'products':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            $params['products'] = getProducts();
            $params['pictures'] = getPictures();
            break;

        case 'item':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            if (isset($url_array['feedback_id'])) {
                $params = doFeedbackAction($url_array);
            }
            $id = $url_array['product_id'];
            $params['item'] = getOneItem('read', $id);
            $params['feedbacks'] = getFeedbacksById($id);
            $params['pics'] = getPicturesByProdId($id);
            break;

        case 'edit-item':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            if (!empty($_POST) || !empty($_FILES)) {
                $editArr = doActionItems($url_array);
                $params = array_merge($params, $editArr);
            }
            break;
        
        // case 'apicalc':
        //     $res = file_get_contents('php://input');
        //     $res1 = json_decode($res, true);
        //     $op1 = (int) $res1->op1;
        //     $op2 = (int) $res1->op2;
        //     $opType = $res1['opType'];
        //     $res1['result'] = mathOperation($op1, $op2, $opType);
        //     _log($res1, "jcalck");
        //     header('Content-Type: application/json');
        //     echo json_encode($res1, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //     die();

        case 'buy':
            session_start();
            $sessionId = session_id();
            $productId = (int) $_POST['id'];
            $price = (int) $_POST['price'];
            setBasket($productId, $sessionId, $price);
            header('Location: /products');
            break;

        case 'basket':
            $params['page'] = implode('/', ['basket', $url_array['main_page']]);
            if (isset($url_array['session_id'])) {
                $sessionId = secUser($url_array['session_id']);
            } else {
                session_start();
                $sessionId = session_id();
            }
                $params['countOrder'] = countBasketBuyer($sessionId);
                $params['summOrder'] = sumOrder($sessionId);
                $params['products'] = allProductsBySessionId($sessionId);
                $params['name'] = getName($sessionId);
            break;

        case 'delbask':
            session_start();
            $sessionId = session_id();
            $basketId = $url_array['basket_id'];
            delFromBaskById($basketId, $sessionId);
            header('Location: /basket');
            die();
        case 'submbuy':
            $params['page'] = implode('/', ['basket', $url_array['main_page']]);
            break;
        case 'buyall':
            session_start();
            $sessionId = secUser(session_id());
            subBuy($sessionId);
            session_regenerate_id();
            header('Location: /');
            die();
        case 'allbuyers':
            if (is_admin($_SESSION['username'])) {
                $params['page'] = implode('/', ['admin', $url_array['main_page']]);
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
            $res = registration();
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
            if (validateUser()) {
                session_start();
                $_SESSION['username'] = secUser();
                header('Location: /');
                die();
            }
            break;

        case 'apilike':
            $id = (int) $url_array['like_id'];
            addLikesProd($id);
            // $response['id'] = $id;
            $response['like'] = getLike($id);
            $r = json_encode($response, JSON_UNESCAPED_UNICODE);
            // var_dump($r);
            echo $r;
            // echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}
