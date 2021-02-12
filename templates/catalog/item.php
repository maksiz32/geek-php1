<div class="titlePage">
    <h2>Просмотр</h2>
</div>
<div>
    <?php if(!empty($item['name'])): ?>
    <h3>Название:</h3>
        <div><?=$item["name"]?></div>
    <h3>Описание:</h3>
        <div><?=$item["description"]?></div>
    <h3>Полное описание:</h3>
        <div><?=$item["more_description"]?></div>
    <h3>Стоимость:</h3>
    <div><?=$item["price"]?></div>
    <br>
    <?php if (!empty($pics)):?>
    <?php foreach ($pics as $pic):?>
        <img src="/img/products/tmb/<?=$pic['image']?>">
    <?php endforeach;?>
    <?php endif;?>
    <a href="/edit-item/<?=$item['id']?>" class="btn-green">Изменить</a>
    <br><br>
    <hr>
    <br>
    <h4>Добавить отзыв:</h4><br>
    <form action="/item/<?=$item['id']?>" method="post">
        <?php if(!empty($feed)): ?>
        <input type="hidden" value="<?=$feed['id']?>" name="id">
        <?php endif; ?>
        <input type="hidden" value="<?=$item['id']?>" name="idProd">
        <label for="name">Имя:</label>
        <input type="text" name="name" value="<?php if(!empty($feed)) echo $feed['name']?>">
        <label for="feedback">Отзыв:</label>
        <textarea name="feedback"><?php if(!empty($feed)) echo $feed['feedback']?></textarea>
        <button type="submit" class="btn-blue">
        <?php if(!empty($feed)): ?>
            Изменить
        <?php else: ?>
            Добавить
        <?php endif; ?>
    </button>
    </form>
    <br><br>
    <hr>
    <br>
    <h4>Отзывы:</h4>
    <p>
        <?php if(!empty($feedbacks)): ?>
            <?php foreach($feedbacks as $feed): ?>
                <br>
                <div>
                    <h4><?=$feed['name']?></h4>
                    <p><?=$feed['feedback']?></p>
                </div>
                <?php if(is_admin($username)): ?>
                <a href="/item/<?=$item['id']?>/edit/<?=$feed['id']?>" class="btn-green">Редактировать</a>
                <a href="/item/<?=$item['id']?>/delete/<?=$feed['id']?>" class="btn-red">Удалить</a>
                <?php endif; ?>
                <br>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <div>Об этом товаре еще нет отзывов</div>
        <?php endif; ?>
    </p>
    <?php else: ?>
    <div>Такого товара не существует</div>
    <?php endif; ?>
</div>