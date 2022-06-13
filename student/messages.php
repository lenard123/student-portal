<?php require_once '__bootstrap.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= student_title('Messages') ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
<?= component_start('layouts/student') ?>

    <div class="container py-8">

        <h1 class="text-2xl font-semibold">Messages</h1>

        <div class="divider"></div>

    </div>

<?= component_end() ?>
</body>
</html>