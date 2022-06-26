<?php 
require_once '__bootstrap.php';
$announcements = Announcement::latest()->get();
?>

<?= component_start('layouts/student') ?>
<div class="py-8 px-4 max-w-screen-md mx-auto">

<div class="flex justify-between items-center">
    <h2 class="font-bold text-xl sm:text-2xl md:text-3xl font-inter">Announcements ✨</h2>
</div>

<div class="divider"></div>

<div class="flex flex-col gap-4">
    <?php foreach ($announcements as $announcement) : ?>
    <div class="card bg-base-100 border border-gray-300">
        <div class="card-body">
            <div class="card-title font-inter leading-3"><?= $announcement->title ?></div>
            <div class="text-sm text-gray-600"><?= $announcement->created_at->diffForHumans() ?></div>
            <p class="mt-4">
                <?= $announcement->description ?>
            </p>
        </div>
    </div>
    <?php endforeach ?>
</div>

</div>
<?= component_end() ?>