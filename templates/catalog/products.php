<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
<div>
    <?php if (!empty($products)):
        foreach ($products as $item): ?>
        <form action="/buy" method="post">
            <div class="galleryCard">
                <a href="/item/<?=$item['id']?>" style="text-decoration: none;">
                <input type="hidden" value="<?=$item['id']?>" name="id">
                    <h3><?=$item['name']?></h3>
                    <?php if(!empty($pictures)): ?>
                        <?php foreach($pictures as $pic): ?>
                            <?php if($pic['id_products'] == $item['id']): ?>
                                <img src='/img/products/tmb/<?=$pic['image']?>' width="150" alt="">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div><?=$item['description']?></div>
                    <span><?=$item['price']?></span>
                </a>
                <?php if ($username): ?>
                    <button type="submit">Купить</button>
                <?php else: ?>
                    <div>Чтобы приобрести товар, авторизуйтесь</div>
                <?php endif; ?>
            </div>
        </form>
    <?php endforeach;
        endif; ?>
</div>