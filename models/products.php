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

function doActionItems($post, $files, $url_array) {
    if (!empty($post)) {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $post['name'])));
        $description = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $post['description'])));
        $more_description = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $post['more_description'])));
        $price = (float) $post['price'];
        if (!isset($url_array[2])) {
            $params['message'] = getOneItem('create', null, ['name' => $name, 'description' => $description, 
                'more_description' => $more_description, 'price' => $price]);//create
            $id = lastId();
            if (!empty($files)) {
                $total_files = count($files['pics']['name']);
                for($i = 0; $i < $total_files; $i++) {
                    $source[$i] = ['name' => $files['pics']['name'][$i], 'type' => $files['pics']['type'][$i], 'tmp_name' => $files['pics']['tmp_name'][$i]];
                    $params['message'] = [uploadImg('/img/products/', $source[$i], 'pictures')];
                    $idPic = lastId();
                    addPicureIdItem($idPic, $id);
                }
            }
        } else {
            $id = (int) $post['id'];
            $params['message'] = getOneItem('edit', $id, ['name' => $name, 'description' => $description, 
                'more_description' => $more_description, 'price' => $price]);//update
        }
    } else if (isset($url_array[2])) {
        if (!isset($url_array[3])) {
            $id = (int) $url_array[2];//show
            $params['item'] = getOneItem('read', $id);
            $params['pics'] = getPicturesByProdId($id);
        } else {
            //delete
        }
    }
    return $params;
}
function addLikesProd($id) {
    getDBRequest("UPDATE products SET likes=likes+1 WHERE id={$id}");
}
function getLike($id) {
    return getDBRequest("SELECT likes FROM products WHERE id='{$id}'")[0]['likes'];
}
