<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
<div>
    <?php if (isset($products)):
        foreach ($products as $item): ?>
        <div class="galleryCard">
            <a href="/edit-item/<?=$item['id']?>" style="text-decoration: none;">
                <h3><?=$item['name']?></h3>
<!-- 
                <img src='/img/gallery/tmb/<?=$image['image']?>' width="150" alt="">
                 -->
                <div><?=$item['description']?></div>
                <span><?=$item['price']?></span>
            </a>
            <a href="#" class="btn-green">Изменить</a>
            <a href="#" class="btn-red">Удалить</a>
        </div>
    <?php endforeach;
        endif; ?>
</div>