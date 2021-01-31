<div class="titlePage">
    <h2>Галерея</h2>
        <div><?=$message?></div>
</div>
<div class="gallery">
    <?php if (isset($images)):
        foreach ($images as $image): ?>
        <div class="galleryCard">
            <a href="/onepic/<?=$image['id']?>" name="modal-<?=$image['id']?>"><img src='/img/gallery/tmb/<?=$image['image']?>' width="150" alt=""></a>
            <a href="gallery/delete/<?=$image['id']?>" class="btn-red">Удалить</a>
        </div>
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
