<?php
$code = $class->code;
$link = Auth::role('student') 
    ? 'student/class.php?code=' . $code
    : 'teacher/class.php?code=' . $code;
?>
<div class="card bg-base-100 shadow">
    <div class="h-32 w-full relative bg-slate-600 p-8 text-base-100">
        <img class="absolute h-full inset-0 object-cover" src="<?= $class->cover ?>">
        <div class="relative">
            <a href="<?= url($link) ?>" class="text-xl font-bold hover:underline"><?= $class->name ?></a>
            <div><?= $class->section ?></div>
            <?php if (Auth::role('student')) : ?>
            <div>Teacher: <?= $class->teacher->fullname ?></div>
            <?php endif ?>
        </div>
    </div>

    <div class="card-body">
        <div class="font-bold leading-3  text-gray-900">Grade</div>
        <div class="text-gray-600"><?= $class->grade ?></div>

        <div class="font-bold leading-3 text-gray-900 mt-4">Enrolled Students</div>
        <div class="text-gray-600"><?= $class->students_count ?></div>

        <div class="font-bold leading-3 text-gray-900 mt-4">Class Code</div>
        <div class="text-gray-600"><?= $code ?></div>
    </div>
</div>