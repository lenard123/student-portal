<?php 
require_once '__bootstrap.php'; 
$class = middleware('can_view_class');
$active = 'work';
$srcs = 'add_work';
?>
<?= component_start('layouts/teacher', compact('srcs')) ?>
    <?= component_start('layouts/class', compact('class', 'active')) ?>
        
        <div>
            <label for="create-work-modal" class="btn gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create
            </label>
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

    <?= slot('body_end') ?>
        <input type="checkbox" checked id="create-work-modal" class="modal-toggle" />
        <div class="modal" id="create-work-page">
            <div class="flex flex-col overflow-y-auto h-screen w-screen max-w-[100vw] max-h-[100vh] rounded-none">
                <div class="navbar bg-base-100 border-b border-gray-300">
                    <div class="flex-none">
                        <label for="create-work-modal" class="cursor-pointer hover:bg-base-200 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </label>
                    </div>
                    <div class="flex-1 ml-4">
                        <span class="rounded-full bg-blue-100 p-2 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </span>
                        <span class="ml-2 font-semibold text-lg text-gray-700">Post Class Work</span>
                    </div>
                    <div class="flex-none">
                        <button @click="submitBtn.click()" class="btn btn-primary btn-sm sm:btn-md">Assign</button>
                    </div>
                </div>

                <div class="bg-base-200 flex-grow flex flex-col md:flex-row">
                    <div class="flex-grow py-4 px-0 sm:p-4 max-w-screen-md mx-auto">
                        <div class="card bg-base-100 border border-gray-300 rounded-none sm:rounded-box">
                            <div class="card-body">
                                <form @submit="handleSubmit">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Title</span>
                                        </label>
                                        <input 
                                            class="input input-bordered" 
                                            required 
                                            type="text" 
                                            name="title"
                                            v-model="data.title"
                                        >
                                    </div>

                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Instruction</span>
                                        </label>
                                        <textarea 
                                            v-model="data.instruction"
                                            required 
                                            class="textarea textarea-bordered w-full" 
                                            name="instruction" 
                                        ></textarea>
                                    </div>

                                    <input class="hidden" type="submit" ref="submitBtn"/>
                                </form>

                            </div>
                        </div>

                        <div class="card bg-base-100 border border-gray-300 mt-4 rounded-none sm:rounded-box">
                            <div class="card-body">
                                <div class="card-title">Attach a file</div>
                                <label class="flex rounded border border-gray-300 cursor-pointer items-center">
                                  <div class="py-2 px-3 text-gray-600 font-semibold bg-gray-200 text-sm border-r border-gray-300">Browse</div>
                                  <div class="py-2 px-3 text-gray-600 text-sm font-semibold flex-grow">
                                    <span v-if="fileCount <= 0">Choose a file</span>
                                    <span v-else v-cloak>{{ fileCount }} file(s) selected</span>
                                  </div>
                                  <span v-show="fileCount >= 1" @click="handleClear" class="mx-4" v-cloak>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                   </span>
                                  <input type="file" ref="fileInput" @change="handleFileChange" name="image" class="opacity-0 fixed -left-[1000px]" multiple>
                                </label>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Deadline (Optional)</span>
                                    </label>
                                    <input
                                        v-model="data.deadline"
                                        class="input input-bordered"
                                        type="date"
                                        min="<?= date('Y-m-d') ?>"
                                    />
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    <?= slot_end() ?>

<?= component_end() ?>
