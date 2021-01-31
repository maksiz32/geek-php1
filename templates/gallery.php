<div class="titlePage">
    <h2>Галерея</h2>
        <div><?=$message?></div>
</div>
<div class="gallery">
    <?php if (isset($images)):
        foreach ($images as $key => $image): ?>
            <a href="#modal-<?=$key?>" name="modal-<?=$key?>"><img src='/img/gallery/tmb/<?=$image?>' width="150" alt=""></a>
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
