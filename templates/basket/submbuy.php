<?php if(isset($messages)): ?>
    <div class="info">
        <ul>
        <?php foreach($messages as $message): ?>
            <li><?=$message?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="/buyall" method="post">
Укажите ваш номер телефона:
<input type="text" name="phone" placeholder="Телефон">
И Имя:
<input type="text" name="name" placeholder="Имя">
<button type="submit">Ввод</button>
</form>