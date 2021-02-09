<?php if (isset($phones)): ?>
    <?php foreach($phones as $phone): ?>
<a href="#"><?=$phone['phone']?></a>
<?php endforeach; ?>
<?php endif; ?>