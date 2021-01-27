<h2>Галерея</h2>
<div class="gallery">
    <?php foreach ($images as $image): ?>
        <img src='/img/gallery/<?=$image?>' width="300" alt="">
    <?php endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="Загрузить" name="load">
</form>
