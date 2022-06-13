<?php require_once '__bootstrap.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= student_title() ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
<?= component_start('layouts/student') ?>

    <div class="container py-8">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>


<?= component_end() ?>
</body>
</html>