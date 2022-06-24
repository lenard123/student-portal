<?php 
require_once '__bootstrap.php';
middleware('admin_only');
?>
<?= component_start('layouts/admin') ?>

    <div class="py-8 px-4 max-w-screen-md mx-auto">

        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl sm:text-2xl md:text-3xl">Announcements ✨</h2>
            <button class="btn btn-primary">
                Create
            </button>
        </div>

        <div class="divider"></div>

        <div class="card bg-base-100 border border-gray-300">
            <div class="card-body">
                <div class="card-title">Sample Announcement #1</div>
                <div class="text-sm text-gray-600">7 days ago</div>
                <p class="mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A sint ipsa, numquam inventore rem at quibusdam nulla eveniet omnis tempore deserunt aut quaerat! Doloribus atque quod dolorum numquam sapiente sit.
                </p>
            </div>
        </div>

    </div>

<?= component_end() ?>