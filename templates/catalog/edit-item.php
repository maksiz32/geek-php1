<div class="titlePage">
    <h2>Добавление товара</h2>
</div>
<?php if(is_array($message)): ?>
    <ol>
    <?php foreach($message as $mes): ?>
        <p><li><?=$mes?></li></p>
    <?php endforeach; ?>
    </ol>
<?php else: ?>
        <p><?=$message ?></p>
<?php endif; ?>
<div>
    <?php if(!isset($noCrud)): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if (isset($item['id'])): ?>
        <input type="hidden" name="id" value='<?php echo $item["id"]?>'>
        <?php endif; ?>
        <label for="name">Название</label>
        <input type="text" name="name" value='<?php if(isset($item)) echo $item["name"]?>' required>
        <label for="description">Описание</label>
        <input type="text" name="description" value='<?php if(isset($item)) echo $item["description"]?>' required>
        <?php if (!isset($item['id'])): ?>
        <label for="price">Полное описание</label>
        <textarea rows="2" maxlength="100000" name="more_description"><?php if(isset($item)) echo $item["more_description"]?></textarea>
        <?php endif; ?>
        <label for="price">Стоимость</label>
        <input type="text" name="price" value='<?php if(isset($item)) echo $item["price"]?>'required>
        <br>
        <?php if (isset($item['id'])):?>
            <?php if (isset($pics)):?>
            <?php foreach ($pics as $pic):?>
                <img src="/img/products/tmb/<?=$pic['path']?>">
            <?php endforeach;?>
            <?php endif;?>
        <?php else:?>
        Добавим фоток? (можно несколько)
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        <input type="file" name="pics[]" multiple accept="image/*">
        <?php endif;?>
        <button type="submit">
            <?php if (isset($item['id'])):?>
                Изменить
                <?php else:?>
                Добавить
            <?php endif;?>
        </button>
    </form>
    <?php else: ?>
        <div>Название</div>
        <div><?=$item["name"]?></div>
        <div>Описание</div>
        <div><?=$item["description"]?></div>
        <div>Полное описание</div>
        <div><?=$item["more_description"]?></div>
        <div>Стоимость</div>
        <div><?=$item["price"]?></div>
        <br>
            <?php if (isset($pics)):?>
            <?php foreach ($pics as $pic):?>
                <img src="/img/products/tmb/<?=$pic['path']?>">
            <?php endforeach;?>
            <?php endif;?>
            <a href="#<?=$item['id']?>" class="btn-green">Изменить</a>
    <?php endif;?>
</div>