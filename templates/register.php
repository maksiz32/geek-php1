<?php if(isset($messages)): ?>
    <div class="info">
        <ul>
        <?php foreach($messages as $message): ?>
            <li><?=$message?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="register-form">
    <h1>Форма для регистрации:</h1>
    <form action="/reg" method="post">
        Имя:
        <input type="text" name="username">
        Пароль:
        <input type="password" name="password">
        <button type="submit">Войти</button>
    </form>
</div>