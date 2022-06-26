<?php 
require_once '__bootstrap.php';
$announcements = Announcement::latest()->get();
?>

<?= component_start('layouts/teacher') ?>
<div class="py-8 px-4 max-w-screen-md mx-auto">

<div class="flex justify-between items-center">
    <h2 class="title">Announcements ✨</h2>
</div>

<div class="divider"></div>

<div class="flex flex-col gap-4">
    <?php foreach ($announcements as $announcement) : ?>
        <?= component('components/announcement-card', compact('announcement')) ?>
    <?php endforeach ?>
</div>

</div>
<?= component_end() ?>