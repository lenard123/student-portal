<?php 
require_once '__bootstrap.php';
$class = middleware('can_view_class');
middleware('teacher/create_post');
$posts = $class->posts;
$teacher = Auth::user();
$active = 'stream';
?>
<?= component_start('layouts/teacher') ?>

    <?= component_start('layouts/class', compact('class', 'active')) ?>
        <?= component('layouts/class/stream', compact('posts', 'teacher')) ?>
    <?= component_end() ?>

<?= component_end() ?>