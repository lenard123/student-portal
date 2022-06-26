<?php
$students = $class->students()->get();
?>
<div class="card bg-base-100">
    <div class="card-body">
        <h4 class="card-title">Teacher</h4>
        <div class="divider my-2"></div>
        <div class="mb-8">
            <div class="flex gap-4 items-center">
                <div class="avatar self-start">
                    <div class="w-10 rounded-full">
                        <img src="<?= $class->teacher->avatar ?>">
                    </div>
                </div>              
                <div class="text-base font-semibold"><?= $class->teacher->fullname ?></div>                  
            </div>
        </div>

        <h4 class="card-title">Students</h4>
        <div class="divider my-2"></div>
        <div class="flex flex-col gap-1">
            <?php foreach ($students as $student) : ?>
            <div class="flex gap-4 items-center">
                <div class="avatar self-start">
                    <div class="w-10 rounded-full">
                        <img src="<?= $student->avatar ?>">
                    </div>
                </div>
                <div class="text-base font-semibold"><?= $student->fullname ?></div>                
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>