<?php ob_start() ?>


<ul>
<?php foreach ($services as $key => $service) { ?>
    <li><?=$service['name']?></li>
<?php } ?>
</ul>


<?php $content = ob_get_clean() ?>
<?php require('view/layout/default.php') ?>