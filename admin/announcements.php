<?php 
require_once '__bootstrap.php';
middleware('admin_only');
$active = 'announcements';
$srcs = 'add_announcement';
$announcements = Announcement::latest()->get();
?>
<?= component_start('layouts/admin', compact('active', 'srcs')) ?>

    <div class="py-8 px-4 max-w-screen-md mx-auto">

        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl sm:text-2xl md:text-3xl font-inter">Announcements ✨</h2>
            <label for='create-announcement-modal' class="btn btn-primary">
                Create
            </label>
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

    <?= slot('body_end') ?>
        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="create-announcement-modal" class="modal-toggle" />
        <div class="modal" id="add-announcement-form">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Post Announcement</h3>
                <form @submit.prevent="handleSubmit">

                    <?= component_start('components/error', ['show_if' => 'isError']) ?>
                        <ul>
                            <li v-for="error in errorMessages">{{ error }}</li>
                        </ul>
                    <?= component_end() ?>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input v-model="data.title" type="text" class="input input-bordered"/>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea v-model="data.description" class="textarea textarea-bordered w-full"></textarea>
                    </div>

                </form>
                <div class="modal-action">
                    <label for="create-announcement-modal" class="btn">Cancel</label>
                    <button @click="handleSubmit" :class="{'loading': isLoading}" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    <?= slot_end() ?>
<?= component_end() ?>