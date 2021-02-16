<div class="titlePage">
    <h2>Каталог товаров</h2>
</div>
    <?php if(isset($messages)): ?>
        <div class="info">
            <ul>
            <?php foreach($messages as $message): ?>
                <li><?=$message?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
<div class="productGallery">
    <?php if (!empty($products)):
        foreach ($products as $item): ?>
            <div class="productCard">
                <!-- <form action="/buy" method="post"> -->
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
                                <i style="color: red;" class="bi bi-hand-thumbs-up like pointer" data-id="<?=$item['id']?>"></i>
                            </div>
                        <br>
                            <button type="submit" class="toBuy pointer" data-id="<?=$item['id']?>" data-price="<?=$item['price']?>">Купить</button>
                <!-- </form> -->
            </div>
    <?php endforeach;
        endif; ?>
<script>
    let buttons_buy = document.querySelectorAll('.toBuy');
    buttons_buy.forEach((elem) => {
        elem.addEventListener('click', function() {
            let id = elem.getAttribute('data-id');
            let price = elem.getAttribute('data-price');
            (
                async function() {
                    const response = await fetch('/apibasket/' + id + "/" + price);
                    const answer = await response.json();
                    document.getElementById('price').innerText = answer.countB;
                }
            )();
        })
    });

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