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

        case 'products':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            session_start();
            $params['session'] = session_id();
            $params['products'] = getProducts();
            $params['pictures'] = getPictures();
            break;

        case 'item':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            $id = (int) $url_array['product_id'];
            if (!empty($_POST)) {
                if (empty($_POST['id'])) {
                    addFeedback();
                } else if (!empty($_POST)) {
                    editFeedback();
                }
                header("Location: /item/{$_POST['idProd']}");
                die();
            }
            if (isset($url_array['feed_action']) && $url_array['feed_action'] == 'edit') {
                $params['feed'] = getFeed($url_array['feedback_id']);
            }
            if (isset($url_array['feed_action']) && $url_array['feed_action'] == 'delete') {
                delFeed($url_array['feedback_id']);
                header("Location: /item/{$id}");
                die();
            }
            $params['item'] = getOneItem('read', $id);
            $params['feedbacks'] = getFeedbacksById($id);
            $params['pics'] = getPicturesByProdId($id);
            break;
        case 'edit-item':
            $params['page'] = implode('/', ['catalog', $url_array['main_page']]);
            if (isset($url_array['id'])) {
                $params['item'] = getOneItem('read', $url_array['id']);
                $params['feedbacks'] = getFeedbacksById($url_array['id']);
                $params['pics'] = getPicturesByProdId($url_array['id']);
            }
            if (!empty($_POST)) {
                $editArr = doActionItems($url_array);
                $params = array_merge($params, $editArr);
                header('Location: /products');
                die();
            }
            break;
######## СДЕЛАНО НА JS - apibasket ##########
/*
        case 'buy':
            session_start();
            $sessionId = session_id();
            $productId = (int) $_POST['id'];
            $price = (int) $_POST['price'];
            setBasket($productId, $sessionId, $price);
            header('Location: /products');
            break;
*/
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
            if (!is_admin($_SESSION['username'])) {
                header("Location: /basket/{$sessionId}");
            } else {
                header("Location: /basket/{$url_array['basket_session_id']}");
            }
            die();
        case 'submbuy':
            $params['page'] = implode('/', ['basket', $url_array['main_page']]);
            break;
        case 'buyall':
            session_start();
            $sessionId = secUser(session_id());
            submitBuy($sessionId);
            session_regenerate_id();
            header('Location: /');
            die();
        case 'allbuyers':
            if (is_admin($_SESSION['username'])) {
                $params['page'] = implode('/', ['admin', $url_array['main_page']]);
                $res = getSubmitBuy();
                $params['phones'] = getSubmitBuyByHuman($res);
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
            die();
        case 'apibasket':
            session_start();
            $sessionId = session_id();
            setBasket($url_array['id'], $sessionId, $url_array['price']);
            $response['countB'] = countInBasket($sessionId);
            $r = json_encode($response, JSON_UNESCAPED_UNICODE);
            echo $r;
            die();
        case 'apistat':
            if (is_admin($_SESSION['username'])) {
                setStatusInBasket($url_array['id'], $url_array['status']);
                $response = getSubmitBuy();
                $resp2 = getSubmitBuyByHuman($response);
                $r = json_encode($resp2, JSON_UNESCAPED_UNICODE);
                echo $r;
                die();
            }
            break;
        case 'my-orders':
            session_start();
            if (isset($_SESSION['username'])) {
                $params['pics'] = getPictures();
                if (is_admin($_SESSION['username'])) {
                    $params['products'] = getAllOrders();
                } else {
                    session_start();
                    $params['products'] = getOrdersByName($_SESSION['username']);
                }
            }
            break;
    }
    return $params;
}
