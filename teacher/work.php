<?php 
require_once '__bootstrap.php'; 
$class = middleware('can_view_class');
$active = 'work';
?>
<?= component_start('layouts/teacher') ?>
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
        <div class="modal">
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
                        <button class="btn btn-primary btn-sm sm:btn-md">Assign</button>
                    </div>
                </div>

                <div class="bg-base-200 flex-grow flex flex-col md:flex-row">
                    <div class="flex-grow py-4 px-0 sm:p-4">
                        <div class="card bg-base-100 border border-gray-300 rounded-none sm:rounded-box">
                            <div class="card-body">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Title</span>
                                    </label>
                                    <input 
                                        class="input input-bordered" 
                                        required 
                                        type="text" 
                                        name="title"
                                    >
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Instruction</span>
                                    </label>
                                    <textarea 
                                        required 
                                        class="textarea textarea-bordered w-full" 
                                        name="instruction" 
                                    ></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card bg-base-100 border border-gray-300 mt-4 rounded-none sm:rounded-box">
                            <div class="card-body">
                                <div class="card-title">Attach a file</div>
                                <label class="flex rounded border border-gray-300 cursor-pointer">
                                  <div class="py-2 px-3 text-gray-600 font-semibold bg-gray-200 text-sm border-r border-gray-300">Browse</div>
                                  <div class="py-2 px-3 text-gray-600 text-sm font-semibold w-full">
                                    <span>Choose a file</span>
                                    <!-- <span x-show="source !== null" x-cloak>1 image selected</span> -->
                                  </div>
                                  <input type="file" name="image" class="opacity-0">
                                </label>

                            </div>
                        </div>
                    </div>
<!--                     <div class="bg-base-100 p-4 flex-shrink-0 border-t md:border-t-0 md:w-[30%] md:border-l border-gray-300">
                        Deadline (Optional)
                    </div> -->
                </div>

            </div>
        </div>
    <?= slot_end() ?>

<?= component_end() ?>
