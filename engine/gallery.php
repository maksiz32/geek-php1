<?php
function getGallery() {
    return getDBRequest('SELECT * FROM gallery ORDER BY countViews DESC');
}

function getOnePic($id) {
    getDBRequest("UPDATE gallery SET countViews=countViews+1 WHERE id={$id}");
    return getDBRequest("SELECT * FROM gallery WHERE id={$id}")[0];
}

function delete($id) {
    return getDBRequest("DELETE FROM gallery WHERE id={$id}");
}

function uploadImg() {
    if (!empty($_FILES['myfile']) && is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        $max_size = 1024*1024*5;
        //Проверка на загрузку не более 5Мб
        if($_FILES["myfile"]["size"] > $max_size) {
            header("Location: /gallery/?message=nonSize");
            die();
        }
        //Проверка на разрешенные mime-типы
        $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
        $valid_types = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp');
        if (!in_array($imageinfo['mime'],  $valid_types)) {
            header("Location: /gallery/?message=nonMime");
            die();
        }
        //Переименование загруженного файла
        $uploadpath = DIR_ROOT . '/img/gallery/';
        $name_file = uniqid() . "." . pathinfo($_FILES['myfile']['name'])['extension'];;
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadpath . $name_file)) {
            $filesize = getFileSize($uploadpath . $name_file);
            $image = new SimpleImage();
            $image->load($uploadpath . $name_file);
            $image->resizeToWidth(150);
            $image->save($uploadpath . "tmb/" . $name_file);
            $res = getDBRequest("INSERT INTO gallery (image, size) VALUES ('{$name_file}', {$filesize})");
            if (mb_substr($res, 0, 10) === 'Ваш запрос') {
                header("Location: /gallery/?message=ok");
                die();
            } else {
                header("Location: /gallery/?message=error");
                die();
            }
        } else {
            // _log($uploadpath, "upload");
            header("Location: /gallery/?message=error");
            die();
        }
    }
}

function getFileSize($file) {
    return filesize($file);
}
