<?php 
require_once '__bootstrap.php'; 
$class = middleware('can_view_class');
$works = $class->works;
$active = 'work';
$srcs = 'add_work';

?>
<?= component_start('layouts/teacher', compact('srcs')) ?>
    <?= component_start('layouts/class', compact('class', 'active')) ?>
        
        <?php if($works->isEmpty()) : ?>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="text-center py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No Classwork</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Get started by posting a new Classwork.
                </p>
                <div class="mt-6">
                    <label for="create-work-modal" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: solid/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Classwork
                    </label>
                </div>
            </div>
        <?php else : ?>
            <div>
                <label for="create-work-modal" class="btn gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create
                </label>
            </div>

            <div class="divider"></div>

            <?php foreach($works as $work) : ?>
            <div class="flex px-4 py-3 gap-4 items-center hover:bg-base-100 hover:shadow-lg rounded-lg">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </button>
                <div class="flex flex-grow gap-x-4 flex-col">
                    <div class="font-semibold flex-grow"><?= $work->title ?></div>
                    <div class="flex flex-col md:flex-row justify-between">
                        <div class="text-sm text-gray-600">Posted <span class="font-semibold"><?= $work->created_at->diffForHumans() ?></span></div>
                        <?php if($work->deadline) : ?>
                            <div class="text-sm text-gray-600">Due <span class="font-semibold"><?= $work->deadline->diffForHumans() ?></span></div>
                        <?php endif ?>
                    </div>
                </div>
                <button class="p-2 hover:bg-gray-300 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
            <?php endforeach ?>
        <?php endif ?>
    <?= component_end() ?>

    <?= slot('body_end') ?>
        <input type="checkbox" id="create-work-modal" class="modal-toggle" />
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
                        <button :class="{loading: isLoading}" @click="submitBtn.click()" class="btn btn-primary btn-sm sm:btn-md">Assign</button>
                    </div>
                </div>

                <div class="bg-base-200 flex-grow flex flex-col md:flex-row">
                    <div class="flex-grow py-4 px-0 sm:p-4 max-w-screen-md mx-auto">
                        <div class="card bg-base-100 border border-gray-300 rounded-none sm:rounded-box">
                            <div class="card-body">
                                <form @submit.prevent="handleSubmit">
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


        <input type="checkbox" id="create-work-error" class="modal-toggle" />
        <div id="create-work-error-modal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">An error occured!!</h3>
                <p class="py-4">
                    <?= component_start('components/error', ['show_if' => true]) ?>
                        <ul>
                            <li v-for="error in errorMessages">{{ error }}</li>
                        </ul>
                    <?= component_end() ?>
                </p>
                <div class="modal-action">
                    <label for="create-work-error" class="btn">Close</label>
                </div>
            </div>
        </div>
    <?= slot_end() ?>

<?= component_end() ?>
