<div class="titlePage">
    <h2>Корзина</h2>
</div>
<div>
    <?php if (isset($countP) && !empty($countP)): ?>
        <a href="/submbuy" class="btn-blue">Оформить заказ</a>
    <?php endif; ?>
    <?php if (!empty($products)):
        foreach ($products as $item): ?>
        <?php if(!is_null($item['name'])): ?>
            <div class="galleryCard">
                <h3><?=$item['name']?></h3>
                <?php if(isset($item['image']) && !empty($item['image'])): ?>
                            <img src='/img/products/tmb/<?=$item['image']?>' width="150" alt="">
                <?php endif; ?>
                <span><?=$item['price']?></span>
            </div>
            <a href="/delbask/<?=$item['id']?>" class="btn-red">Удалить из корзины</a>
            <?php endif; ?>
    <?php endforeach;
        endif; ?>
    <?php if (isset($countP) && !empty($countP)): ?>
        <br>
        <a href="/submbuy" class="btn-blue">Оформить заказ</a>
    <?php endif; ?>
</div>