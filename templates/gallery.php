<?php
$messages = [
    'ok' => 'Файл заружен',
    'error' => 'Ошибка загрузки',
    'nonSize' => 'Файл не должен быть больше 5Мб',
    'nonMime' => 'Можно загружать только изображения'
];
    if (!empty($_FILES['myfile']) && is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        $max_size = 1024*1024*5;
        if($_FILES["myfile"]["size"] > $max_size) {
            header("Location: /?page=gallery&message=nonSize");
            exit;
        }
        $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
        $valid_types = array('image/gif', 'image/jpeg', 'image/png', 'image/bmp');
        if (in_array($imageinfo[2],  $valid_types)) {
            header("Location: /?page=gallery&message=nonMime");
            exit;
        }

        include(DIR_ROOT . '/engine/classSimpleImage.php');
        $uploadpath = DIR_ROOT . '/public/img/gallery/' . uniqid();
        $ext = pathinfo($_FILES['myfile']['name'])['extension'];
        $uploadpath = $uploadpath . '.' . $ext;
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadpath)) {

            // сделать ресайз файла $path, и сохранить его в small
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
    $message = $messages[$_GET['message']];
?>
<h2>Галерея</h2>
    <div><?=$message?></div>
<div class="gallery">
    <?php if (isset($images)):
        foreach ($images as $image): ?>
        <img src='/img/gallery/tmb/<?=$image?>' width="150" alt="">
    <?php endforeach;
    endif; ?>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <label>Загрузка файла:</label>
    <div>
        <input type="file" name="myfile" accept="image/*">
        <input type="submit" class="submit" value="Загрузить" name="load">
    </div>
</form>
