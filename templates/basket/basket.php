<div class="titlePage">
    <h2>Корзина</h2>
</div>
<div>
    <?php if (!empty($products)):
        foreach ($products as $item): ?>
            <div class="galleryCard">
                <h3><?=$item['name']?></h3>
                <?php if(isset($item['image']) && !empty($item['image'])): ?>
                            <img src='/img/products/tmb/<?=$item['image']?>' width="150" alt="">
                <?php endif; ?>
                <span><?=$item['price']?></span>
            </div>
            <a href="/delbask/<?=$item['id']?>" class="btn-red">Удалить из корзины</a>
    <?php endforeach;
        endif; ?>
</div>