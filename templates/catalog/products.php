<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
<div>
    <?php if (isset($products)):
        foreach ($products as $item): ?>
        <div class="galleryCard">
            <a href="/edit-item/<?=$item['id']?>" style="text-decoration: none;">
                <h3><?=$item['name']?></h3>
                <?php if(isset($pictures)): ?>
                    <?php foreach($pictures as $pic): ?>
                        <?php if($pic['id_products'] == $item['id']): ?>
                            <img src='/img/products/tmb/<?=$pic['image']?>' width="150" alt="">
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div><?=$item['description']?></div>
                <span><?=$item['price']?></span>
            </a>
            <a href="#" class="btn-red">Удалить</a>
        </div>
    <?php endforeach;
        endif; ?>
</div>