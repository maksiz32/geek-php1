Админка покупок:<br>
<?php if (isset($phones)): ?>
    <table class="allOrders">
        <caption>Все заказы.</caption>
        <tr>
            <th class="text-center">№</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Действие</th>
        </tr>
<?php $i=1 ?>
    <?php foreach($phones as $phone): ?>
        <tr>
            <td class="text-center"><?=$i?>.</td>
            <td><?=$phone['name']?></td>
            <td><?=$phone['phone']?></td>
            <td>
                <a href="/basket/<?=$phone['id_session']?>">Перейти к заказу</a>
            </td>
        </tr>
<?php $i++ ?>
<?php endforeach; ?>
    </table>
<?php endif; ?>