<?php
require_once '__bootstrap.php';
$classes = Auth::user()->classes;
?>

<?= component_start('layouts/teacher') ?>
    <div class="container py-8">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-y-2">
            <h1 class="text-2xl font-semibold">Classes you teaches</h1>
            <a href="<?= url('teacher/add_class.php') ?>" class="btn btn-sm">Create New Class</a>
        </div>

        <div class="divider"></div>

        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
            <?php foreach($classes as $class) : ?>
                <?= component('components/class-card', compact('class')) ?>
            <?php endforeach ?>
        </div>

    </div>


<?= component_end() ?>