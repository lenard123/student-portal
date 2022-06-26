<div class="card bg-base-100 border border-gray-300">
    <div class="card-body">
        <div class="card-title font-inter leading-3"><?= $announcement->title ?></div>
        <div class="text-sm text-gray-600"><?= $announcement->created_at->diffForHumans() ?></div>
        <p class="mt-4">
            <?= $announcement->description ?>
        </p>
    </div>
</div>