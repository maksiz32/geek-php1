<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
<div class="productGallery">
    <?php if (!empty($products)):
        foreach ($products as $item): ?>
            <div class="productCard">
                <form action="/buy" method="post">
                        <a href="/item/<?=$item['id']?>" style="text-decoration: none;">
                            <input type="hidden" value="<?=$item['id']?>" name="id">
                                <h3><?=$item['name']?></h3>
                                <div class="productImg">
                                <?php if(!empty($pictures)): ?>
                                    <?php foreach($pictures as $pic): ?>
                                        <?php if($pic['id_products'] == $item['id']): ?>
                                            <img src='/img/products/tmb/<?=$pic['image']?>' width="150" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </div>
                        </a>
                            <div class="productDescription">
                                <span><?=$item['description']?></span>
                                <span>Цена: <?=$item['price']?></span>
                                <input type="hidden" value="<?=$item['price']?>" name="price"><br>
                                <span>Likes: <span id="<?=$item['id']?>"><?=$item['likes']?></span>
                                <i style="color: red;" class="bi bi-hand-thumbs-up like" data-id="<?=$item['id']?>"></i>
                            </div>
                        <br>
                        <?php if ($username): ?>
                            <button type="submit">Купить</button>
                        <?php else: ?>
                            <div>Чтобы приобрести товар, авторизуйтесь</div>
                        <?php endif; ?>
                </form>
            </div>
    <?php endforeach;
        endif; ?>
<script>
    let buttons = document.querySelectorAll('.like');
    buttons.forEach((elem) => {
        elem.addEventListener('click', function() {
            let id = elem.getAttribute('data-id');
            (
                async function() {
                    const response = await fetch('/apilike/' + id);
                    const answer = await response.json();
                    document.getElementById(id).innerText = answer.like;
                }
            )();
        })
    });
</script>
</div>