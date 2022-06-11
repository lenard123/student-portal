<div class="flex flex-col min-h-screen">
    <?= component('layouts/main/navbar') ?>
    <main class="flex-grow bg-base-200">
        <?= $slot ?>
    </main>
    <?= component('layouts/main/footer') ?>
</div>