<?php
function getProducts($limit = null) {
    if (is_null($limit)) {
        return getDBRequest('SELECT * FROM products');
    } else {
        return getDBRequest("SELECT * FROM products LIMIT {$limit}");
    }
}

function getOneItem($action, $id, $vars = null) {
    switch ($action) {
        case 'read':
            return getDBRequest("SELECT * FROM products WHERE id={$id}");
            break;
        case 'edit':
        case 'create':
        case 'delete':
    }
}