<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
<div>
    <a href="gallery/delete/<?=$image['id']?>" class="btn-blue">Добавить товар</a>
    <?php if (isset($products)):
        foreach ($products as $item): ?>
        <div class="galleryCard">
            <a href="/onepic/<?=$item['id']?>">
                <h3><?=$item['name']?></h3>
                <img src='/img/gallery/tmb/<?=$image['image']?>' width="150" alt="">
                <div><?=$item['description']?></div>
                <span><?=$item['price']?></span>
            </a>
            <a href="gallery/delete/<?=$image['id']?>" class="btn-red">Изменить</a>
            <a href="gallery/delete/<?=$image['id']?>" class="btn-red">Удалить</a>
        </div>
    <?php endforeach;
        endif; ?>
</div>