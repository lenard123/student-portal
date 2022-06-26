<div class="flex flex-col min-h-screen">
    <?= component('layouts/main/navbar') ?>
    <main class="flex-grow bg-slate-100">
        <?= $slot ?>
    </main>
    <?= component('layouts/main/footer') ?>
</div>