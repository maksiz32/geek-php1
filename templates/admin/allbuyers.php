Админка покупок:<br>
<?php if (isset($phones)): ?>
    <table class="allOrders">
        <caption>Все заказы.</caption>
        <tr>
            <th class="text-center">№</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th>Действие</th>
        </tr>
<?php $i=1 ?>
    <?php foreach($phones as $phone): ?>
        <tr>
            <td class="text-center"><?=$i?>.</td>
            <td><?=$phone['name']?></td>
            <td><?=$phone['phone']?></td>
            <td>
                <mark><span id="<?=$phone['id']?>"><?=$phone['human_status']?></span></mark>&nbsp
                <?php if(is_admin($username)): ?> :: Поменять на:&nbsp
                    <span class="<?php if($phone['status'] == 1): ?>btn-status<?php else: ?>btn<?php endif; ?> stat" data-id="<?=$phone['id']?>/1" id="<?=$phone['id']?>/1">
                        Оформлен
                    </span>&nbsp
                    <span class="<?php if($phone['status'] == 2): ?>btn-status<?php else: ?>btn<?php endif; ?> stat" data-id="<?=$phone['id']?>/2" id="<?=$phone['id']?>/2">
                        Оплачен
                    </span>&nbsp
                    <span class="<?php if($phone['status'] == 3): ?>btn-status<?php else: ?>btn<?php endif; ?> stat" data-id="<?=$phone['id']?>/3" id="<?=$phone['id']?>/3">
                        Отправлен
                    </span>&nbsp
                    <span class="<?php if($phone['status'] == 4): ?>btn-status<?php else: ?>btn<?php endif; ?> stat" data-id="<?=$phone['id']?>/4" id="<?=$phone['id']?>/4">
                        Завершен
                    </span>
                <?php endif; ?>
            </td>
            <td>
                <a href="/basket/<?=$phone['id_session']?>">Перейти к заказу</a>
            </td>
        </tr>
<?php $i++ ?>
<?php endforeach; ?>
    </table>
<script>
    let buttons = document.querySelectorAll('.stat');
    buttons.forEach((elem) => {
        elem.addEventListener('click', function() {
            let id = elem.getAttribute('data-id');
            (
                async function() {
                    const response = await fetch('/apistat/' + id);
                    const answer = await response.json();
                    answer.forEach((item) => {
                        document.getElementById(item.id).innerText = item.human_status;
                        for(i=1;i<=4;i++) {
                            document.getElementById(item.id+"/"+i).classList.remove('btn-status');
                            document.getElementById(item.id+"/"+i).classList.add('btn');
                        }
                        document.getElementById(item.id+"/"+item.status).classList.remove('btn');
                        document.getElementById(item.id+"/"+item.status).classList.add('btn-status');
                    });
                }
            )();
        })
    });
</script>
<?php endif; ?>