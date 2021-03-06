<?php
function getGallery($site_gallery) {
    $avalableEx = ['jpg', 'jpeg', 'bmp', 'gif', 'png'];
    foreach (new DirectoryIterator($site_gallery) as $file) {
        if ($file->isFile() && (in_array($file->getExtension(), $avalableEx))) {
            $galleryRequest[] = $file->getFilename();
        }
    }
    return $galleryRequest;
}

function uploadImg() {
    if (!empty($_FILES['myfile']) && is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        $max_size = 1024*1024*5;
        //Проверка на загрузку не более 5Мб
        if($_FILES["myfile"]["size"] > $max_size) {
            header("Location: /?page=gallery&message=nonSize");
            die();
        }
        //Проверка на разрешенные mime-типы
        $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
        // _log($imageinfo, 'imginfo-upload');
        $valid_types = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp');
        if (!in_array($imageinfo['mime'],  $valid_types)) {
            header("Location: /?page=gallery&message=nonMime");
            die();
        }
        //Переименование загруженного файла
        $uploadpath = DIR_ROOT . '/img/gallery/' . uniqid();
        $ext = pathinfo($_FILES['myfile']['name'])['extension'];
        $uploadpath = $uploadpath . '.' . $ext;
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadpath)) {
            $image = new SimpleImage();
            $image->load($uploadpath);
            $image->resizeToWidth(150);
            $path = explode('/', $uploadpath);
            $tempArr = $path[count($path) - 1];
            $path[count($path) - 1] = 'tmb';
            $path[] = $tempArr;
            $small_file = implode('/', $path);
            $image->save($small_file);
            header("Location: /?page=gallery&message=ok");
        } else {
            // _log($uploadpath, "upload");
            header("Location: /?page=gallery&message=error");
        }
    }
}
