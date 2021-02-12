<?php
function getGallery() {
    return getDBRequest('SELECT * FROM gallery ORDER BY countViews DESC');
}

function getOnePic(int $id) {
    return getDBRequest("SELECT * FROM gallery WHERE id={$id}")[0];
}

function addLikes($id) {
    getDBRequest("UPDATE gallery SET countViews=countViews+1 WHERE id={$id}");
}

function delete(int $id) {
    return getDBRequest("DELETE FROM gallery WHERE id={$id}");
}

function uploadImg($path, $table, $source = null) {
    $source = $_FILES['myfile'];
    if (!is_null($source) && is_uploaded_file($source['tmp_name'])) {
        $max_size = 1024*1024*5;
        //Проверка на загрузку не более 5Мб
        if($source["size"] > $max_size) {
            return "Файл не должен быть больше 5Мб";
        }
        //Проверка на разрешенные mime-типы
        $imageinfo = getimagesize($source['tmp_name']);
        $valid_types = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp');
        if (!in_array($imageinfo['mime'],  $valid_types)) {
            return "Можно загружать только изображения";
        }
        //Переименование загруженного файла
        $uploadpath = DIR_ROOT . $path;
        $name_file = uniqid() . "." . pathinfo($source['name'])['extension'];
        if (move_uploaded_file($source['tmp_name'], $uploadpath . $name_file)) {
            $image = new SimpleImage();
            $image->load($uploadpath . $name_file);
            $image->resizeToWidth(800);
            $image->save($uploadpath . $name_file);
            $filesize = getFileSize($uploadpath . $name_file);
            $image = new SimpleImage();
            $image->load($uploadpath . $name_file);
            $image->resizeToWidth(150);
            $image->save($uploadpath . "tmb/" . $name_file);
            getDBRequest("INSERT INTO {$table} (image, size) VALUES ('{$name_file}', {$filesize})");
        } else {
            return "Ошибка загрузки";
        }
    }
}

function getFileSize($file) {
    return filesize($file);
}
