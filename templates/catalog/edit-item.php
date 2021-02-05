<div class="titlePage">
    <h2>Добавление товара</h2>
</div>
<div>
    <form enctype="multipart/form-data">
        <?php if (isset($item['id'])): ?>
        <input type="hidden" name="id" value='<?php echo $item["id"]?>'>
        <?php endif; ?>
        <label for="name">Название</label>
        <input type="text" name="name" value='<?php if(isset($item)) echo $item["name"]?>' require>
        <label for="description">Описание</label>
        <input type="text" name="description" value='<?php if(isset($item)) echo $item["description"]?>' require>
        <label for="price">Стоимость</label>
        <input type="text" name="price" value='<?php if(isset($item)) echo $item["price"]?>'require>
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
</div>