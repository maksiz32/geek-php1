Админка покупок:<br>
<?php if (isset($phones)): ?>
<?php $i=1 ?>
    <?php foreach($phones as $phone): ?>
<a href="#"><div><?=$i?>. <?=$phone['phone']?></div></a>
<?php $i++ ?>
<?php endforeach; ?>
<?php endif; ?>