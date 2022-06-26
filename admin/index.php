<?php 
require_once '__bootstrap.php';
middleware('admin_only');
?>

<?= component_start('layouts/admin', ['active' => 'dashboard']) ?>
    test
<?= component_end() ?>