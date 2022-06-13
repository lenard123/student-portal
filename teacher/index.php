<?php require_once '__bootstrap.php' ?>
<?= component_start('layouts/teacher') ?>
    <div class="container py-8">

        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Classes you teaches</h1>
            <a href="<?= url('teacher/add_class.php') ?>" class="btn btn-sm">Create New Class</a>
        </div>

        <div class="divider"></div>

        <div class="grid grid-cols-3">

            <div class="card bg-base-100">
                <figure>
                    <img class="h-32 w-full object-cover" src="https://gstatic.com/classroom/themes/img_graduation.jpg">
                </figure>
            </div>

        </div>

    </div>


<?= component_end() ?>