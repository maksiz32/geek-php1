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
            extract($vars, EXTR_OVERWRITE);
            return getDBRequest("UPDATE products SET name='{$name}', description='{$description}', more_description='{$more_description}', price='{$price}' WHERE id={$id}");
            break;
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

function getPicturesByProdId($id) {
    return getDBRequest("SELECT * FROM pictures WHERE id_products = '{$id}'");
}