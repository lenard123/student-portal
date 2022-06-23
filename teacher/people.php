<?php 
require_once '__bootstrap.php'; 
$class = middleware('can_view_class');
$active = 'people';
?>
<?= component_start('layouts/teacher') ?>
    <?= component_start('layouts/class', compact('class', 'active')) ?>
        <?= component('layouts/class/people', compact('class')) ?>
    <?= component_end() ?>
<?= component_end() ?>