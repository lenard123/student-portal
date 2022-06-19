<?php 
require_once '__bootstrap.php';

$class = Classes::where('code', get('code'))->first();
$is_enrolled = Auth::user()->isEnrolled($class);
$posts = $class->posts;
$teacher = $class->teacher;
?>
<?= component_start('layouts/student') ?>
    <?php if (is_null($class) || !$is_enrolled) : ?>
        <?= component('layouts/class/not-found', 'student') ?>
    <?php else : ?>
        <?= component_start('layouts/class', compact('class')) ?>
            <?= component('layouts/class/stream', compact('posts', 'teacher')) ?>
        <?= component_end() ?>
    <?php endif ?>
<?= component_end() ?>