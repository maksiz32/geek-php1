<?php if(isset($messages)): ?>
    <div class="info">
        <ul>
        <?php foreach($messages as $message): ?>
            <li><?=$message?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div style="width: 99vw; text-align: center;">
    <img src='/img/gallery/<?=$pic['image']?>' class="bigPic">
    <p>Количество просмотров: <?=$pic['countViews']?></p>
    <p><?=$pic['image']?> (<?=$pic['size']?> байт)</p>
</div>