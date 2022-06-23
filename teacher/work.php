<?php 
require_once '__bootstrap.php'; 
$class = middleware('can_view_class');
$active = 'work';
?>
<?= component_start('layouts/teacher') ?>
    <?= component_start('layouts/class', compact('class', 'active')) ?>
        
        <div>
            <button class="btn gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create
            </button>
        </div>

        <div class="divider"></div>

        <div>
            <?php foreach([1,2,3] as $post) : ?>
            <div class="flex px-4 py-3 gap-4 items-center hover:bg-base-100 hover:shadow-lg rounded-lg">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </button>
                <div class="flex flex-grow gap-x-4 flex-col">
                    <div class="font-semibold flex-grow">Assignment #<?= $post ?></div>
                    <div class="text-sm text-gray-600 font-semibold">Posted 9:30pm</div>
                </div>
                <button class="p-2 hover:bg-gray-300 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
            <?php endforeach ?>
        </div>

    <?= component_end() ?>
<?= component_end() ?>