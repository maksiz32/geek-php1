<?php
function setBasket($productId, $sessionId, $price) {
    return getDBRequest("INSERT INTO basket (id_products, id_session, price) VALUES ('{$productId}','{$sessionId}','{$price}')");
}
function countInBasket($sessionId) {
    $count =  getDBRequest("SELECT COUNT(id_products) AS count FROM basket WHERE id_session='{$sessionId}'");
    return $count[0]['count'];
}
function allProductsBySessionId($sessionId) {
    return getDBRequest("SELECT basket.id AS id, basket.id_products, basket.id_session AS id_session, products.name, products.price, pictures.image FROM basket LEFT JOIN products ON basket.id_session='{$sessionId}' AND basket.id_products=products.id LEFT JOIN pictures ON basket.id_products=pictures.id_products GROUP BY id");
}
function delFromBaskById($basketId, $sessionId) {
    $sessionIdFromDB = getDBRequest("SELECT id_session FROM basket WHERE id='{$basketId}'")[0]['id_session'];
    if ($sessionIdFromDB == $sessionId || is_admin($_SESSION['username'])) {
        return getDBRequest("DELETE FROM basket WHERE id='{$basketId}'");
    }
}
function submitBuy($sessionId) {
    $sessId = secUser($sessionId);
    $phone = secUser($_POST['phone']);
    $name = secUser($_POST['name']);
    getDBRequest("INSERT INTO subbuy (id_session, phone, name) VALUES ('{$sessId}','{$phone}','{$name}')");
}
function getStatus($req) {
    $arr = [
        '1' => 'Оформлен',
        '2' => 'Оплачен',
        '3' => 'Отправлен',
        '4' => 'Завершен'
    ];
    return $arr[$req];
}
function setStatus($req) {
    $arr = [
        'Оформлен' => '1',
        'Оплачен' => '2',
        'Отправлен' => '3',
        'Завершен' => '4'
    ];
    return $arr[$req];
}
function setStatusInBasket($id, $status) {
    getDBRequest("UPDATE subbuy SET status={$status} WHERE id={$id}");
}
function getSubmitBuy() {
    $result = getDBRequest("SELECT * FROM subbuy");
    return $result;
}
function getSubmitBuyByHuman($result) {
    foreach($result as &$res) {
        $res['human_status'] = getStatus($res['status']);
    }
    return $result;
}
function countBasketBuyer($sessionId) {
    return getDBRequest("SELECT count(id) as count FROM basket WHERE id_session='{$sessionId}'")[0]['count'];
}
function sumOrder($sessionId) {
    return getDBRequest("SELECT sum(price) as sum FROM basket WHERE id_session='{$sessionId}'")[0]['sum'];
}
function getName($sessionId) {
    return getDBRequest("SELECT name FROM subbuy WHERE id_session='{$sessionId}'")[0]['name'];
}
function getOrdersByName($username) {
    return getDBRequest("SELECT subbuy.id, subbuy.id_session, subbuy.name, subbuy.phone, subbuy.status, basket.id_products, basket.price, products.name as product, products.description, products.likes, pictures.image FROM subbuy LEFT JOIN basket ON subbuy.id_session=basket.id_session LEFT JOIN products ON basket.id_products=products.id LEFT JOIN pictures ON pictures.id_products=basket.id_products WHERE subbuy.name='{$username}' GROUP BY basket.id_products ORDER BY id_session");
}
function getAllOrders() {
    return getDBRequest("SELECT subbuy.id, subbuy.id_session, subbuy.name, subbuy.phone, subbuy.status, basket.id_products, basket.price, products.name as product, products.description, products.likes, pictures.image FROM subbuy LEFT JOIN basket ON subbuy.id_session=basket.id_session LEFT JOIN products ON basket.id_products=products.id LEFT JOIN pictures ON pictures.id_products=basket.id_products GROUP BY basket.id_products ORDER BY id_session");
}
