<?php 
require_once '__bootstrap.php';
$class = Classes::where('code', get('code'))->first();
middleware('teacher/create_post');
$posts = $class->posts;
$teacher = Auth::user();

// var_dump($posts->first()->created_at->diffForHumans());
// die();
?>
<?= component_start('layouts/teacher') ?>

    <?= component_start('layouts/class', compact('class')) ?>
        <?= component('layouts/class/stream', compact('posts', 'teacher')) ?>
    <?= component_end() ?>

<?= component_end() ?>