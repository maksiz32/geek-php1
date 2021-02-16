<div class="n-auth">
    <?php if(isset($messages)): ?>
        <div class="info">
            <ul>
            <?php foreach($messages as $message): ?>
                <li><?=$message?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if ($username): ?>
        <span>Добро пожаловать, <?=$username?></span>
        <div style="padding-left: 5px;"><a href="/logout">Выйти</a></div>
    <?php else: ?>
        <form action="/auth" method="post">
        Имя:
        <input type="text" name="username">
        Пароль:
        <input type="password" name="password">
        <button type="submit">Войти</button>
        </form>
        <div class="b-auth">
            <a href="/register">Зарегистрироваться</a>
        </div>
    <?php endif; ?>
</div>