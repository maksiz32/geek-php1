<div class="titlePage">
    <h2>Галерея</h2>
        <div><?=$message?></div>
</div>
<div class="gallery">
    <?php if (isset($images)):
        foreach ($images as $key => $image): ?>
            <a href="#modal-<?=$key?>" name="modal-<?=$key?>"><img src='/img/gallery/tmb/<?=$image?>' width="150" alt=""></a>
            <!-- #customize - здесь будет располагаться модальное окно -->
                <div id="modal-<?=$key?>" class="modalwindow">
                <!-- Заголовок модального окна -->
                <h2><?=$image?></h2>
                <!-- кнопка закрытия окна определяется как класс close -->
                <a href="#" class="close">X</a>
                    <div class="content">
                        <img src='/img/gallery/<?=$image?>' width="350" alt="">
                    </div>
                </div>
    <?php endforeach;
        endif; ?>

</div>
<script>
    //выбираем все теги с именем  modal
$('a[name^="modal-"]').click(function(e) {
    //Отменяем поведение ссылки
    e.preventDefault();
    //Получаем тег A
    var id = $(this).attr('href');
    console.log(id);
    //Получаем ширину и высоту окна
    var winH = $(window).height();
    var winW = $(window).width();
    //Устанавливаем всплывающее окно по центру
    $(id).css('top', winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    //эффект перехода
    $(id).fadeIn(500);
});
//если нажата кнопка закрытия окна
$('.modalwindow .close').click(function (e) {
    //Отменяем поведение ссылки
    e.preventDefault();
    $('.modalwindow').fadeOut(500);
});
</script>
<form action="" method="post" enctype="multipart/form-data">
    <label>Загрузка файла:</label>
    <div>
        <input type="file" name="myfile" accept="image/*">
        <input type="submit" class="submit" value="Загрузить" name="load">
    </div>
</form>
