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
            return getDBRequest("SELECT * FROM products WHERE id={$id}")[0];
        case 'edit':
            extract($vars, EXTR_OVERWRITE);
            return getDBRequest("UPDATE products SET name='{$name}', description='{$description}', more_description='{$more_description}', price='{$price}' WHERE id={$id}");
        case 'create':
            extract($vars, EXTR_OVERWRITE);
            // var_dump($name);
            // die();
            return getDBRequest("INSERT INTO products (name, description, more_description, price) VALUES ('{$name}','{$description}','{$more_description}','{$price}')");
        case 'delete':
            //TODO
            break;
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

function doActionItems($url_array) {
    if (!empty($_POST)) {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['name'])));
        $description = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['description'])));
        $more_description = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['more_description'])));
        $price = (int) $_POST['price'];
        if (!isset($url_array['id'])) {
            $params['message'] = getOneItem('create', null, ['name' => $name, 'description' => $description, 
                'more_description' => $more_description, 'price' => $price]);//create
            $id = lastId();
            if (!empty($_FILES)) {
                $total_files = count($_FILES['pics']['name']);
                for($i = 0; $i < $total_files; $i++) {
                    $source[$i] = ['name' => $_FILES['pics']['name'][$i], 'type' => $_FILES['pics']['type'][$i], 'tmp_name' => $_FILES['pics']['tmp_name'][$i]];
                    $params['message'] = [uploadImg('/img/products/', 'pictures', $source[$i])];
                    $idPic = lastId();
                    addPicureIdItem($idPic, $id);
                }
            }
        } else {
            $id = (int) $_POST['id'];
            $params['message'] = getOneItem('edit', $id, ['name' => $name, 'description' => $description, 
                'more_description' => $more_description, 'price' => $price]);//update
        }
    } else {
            $id = (int) $url_array['id'];//show
            $params['item'] = getOneItem('read', $id);
            $params['pics'] = getPicturesByProdId($id);
    }
    return $params;
}
function addLikesProd($id) {
    getDBRequest("UPDATE products SET likes=likes+1 WHERE id={$id}");
}
function getLike($id) {
    return getDBRequest("SELECT likes FROM products WHERE id='{$id}'")[0]['likes'];
}
