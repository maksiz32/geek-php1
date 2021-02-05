<?php
function getProducts($limit = null) {
    if (is_null($limit)) {
        return getDBRequest('SELECT * FROM products');
    } else {
        return getDBRequest("SELECT * FROM products LIMIT {$limit}");
    }
}

function getOneItem($action, $id=null, $vars = null) {
    switch ($action) {
        case 'read':
            return getDBRequest("SELECT * FROM products WHERE id={$id}");
            break;
        case 'edit':
        case 'create':
            $time = date('Y-m-d');
            extract($vars, EXTR_OVERWRITE);
            // var_dump($name);
            // die();
            return getDBRequest("INSERT INTO products (name, description, more_description, price, sreated_at) VALUES ('{$name}','{$description}','{$more_description}','{$price}','{$time}')");
            break;
        case 'delete':
    }
}

function addPicureIdItem($idPic, $idItem) {
    getDBRequest("UPDATE pictures SET id_products={$idItem} WHERE id={$idPic}");
}

function getPictures() {
    return getDBRequest('SELECT * FROM pictures');
}