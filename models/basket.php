<?php
function setBasket($productId, $sessionId) {
    return getDBRequest("INSERT INTO basket (id_products, id_session) VALUES ('{$productId}','{$sessionId}')");
}
function countInBasket($sessionId) {
    $count =  getDBRequest("SELECT COUNT(id_products) AS count FROM basket WHERE id_session='{$sessionId}'");
    return $count[0]['count'];
}
function allProductsBySessionId($sessionId) {
    return getDBRequest("SELECT basket.id AS id, basket.id_products, products.name, products.price, pictures.image FROM basket LEFT JOIN products ON basket.id_session='{$sessionId}' AND basket.id_products=products.id LEFT JOIN pictures ON basket.id_products=pictures.id_products GROUP BY id");
}
function delFromBaskById($baskId) {
    return getDBRequest("DELETE FROM basket WHERE basket.id = '{$baskId}'");
}
