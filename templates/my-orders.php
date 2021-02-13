Все покупки:<br>
<?php if(isset($products)): ?>
    <table class="allOrders">
        <caption>Все заказы.</caption>
        <tr>
            <th class="text-center">#</th>
            <th>Код заказа</th>
            <th>Имя пользователя</th>
            <th>Телефон</th>
            <th>Статус заказа</th>
            <th>Стоимость</th>
            <th>Продукт</th>
            <th>Фото</th>
        </tr>
<?php $i=1 ?>
    <?php foreach($products as $prod): ?>
        <tr>
            <td class="text-center"><?=$i?>.</td>
            <td><?=mb_substr($prod['id_session'], 0, 5)?></td>
            <td><?=$prod['name']?></td>
            <td><?=$prod['phone']?></td>
            <td><?=getStatus($prod['status'])?></td>
            <td><?=$prod['price']?></td>
            <td><?=$prod['product']?></td>
            <td><?php if(isset($prod['image'])): ?><img style="width: 80px;" src="/img/products/<?=$prod['image']?>"><?php endif; ?></td>
        </tr>
<?php $i++ ?>
<?php endforeach; ?>
    </table>
<?php endif; ?>
