<?php
function setBasket($productId, $sessionId, $price) {
    return getDBRequest("INSERT INTO basket (id_products, id_session, price) VALUES ('{$productId}','{$sessionId}','{$price}')");
}
function countInBasket($sessionId) {
    $count =  getDBRequest("SELECT COUNT(id_products) AS count FROM basket WHERE id_session='{$sessionId}'");
    return $count[0]['count'];
}
function allProductsBySessionId($sessionId) {
    return getDBRequest("SELECT basket.id AS id, basket.id_products, products.name, products.price, pictures.image FROM basket LEFT JOIN products ON basket.id_session='{$sessionId}' AND basket.id_products=products.id LEFT JOIN pictures ON basket.id_products=pictures.id_products GROUP BY id");
}
function delFromBaskById($basketId, $sessionId) {
    return getDBRequest("DELETE FROM basket WHERE id = '{$basketId}' AND id_session='{$sessionId}'");
}
function subBuy($sessionId) {
    $sessId = secUser($sessionId);
    $phone = secUser($_POST['phone']);
    $name = secUser($_POST['name']);
    getDBRequest("INSERT INTO subbuy (id_session, phone, name) VALUES ('{$sessId}','{$phone}','{$name}')");
}
function getPhone() {
    return getDBRequest("SELECT * FROM subbuy");
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
