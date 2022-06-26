<?php require_once '__bootstrap.php' ?>
<?php 
    $props = [
        'title' => 'Create New Class',
        'srcs' => ['add_class'],
    ] 
?>
<?= component_start('layouts/teacher', $props) ?>
    <div class="container py-8" id='add-class-page'>

        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Create New Class</h1>
        </div>

        <div class="divider"></div>

        <div class="card bg-base-100 max-w-screen-sm">
            <div class="card-body">
                <form @submit.prevent='handleSubmit' method="POST">

                    <?= component_start('components/error', ['show_if' => 'isError']) ?>
                        <ul>
                            <li v-for="error in errorMessages">{{ error }}</li>
                        </ul>
                    <?= component_end() ?>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Class Name</span>
                        </label>
                        <input 
                            class="input input-bordered" 
                            required 
                            v-model="data.name"
                            type="text" 
                            name="name"
                        >
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Grade</span>
                        </label>
                        <input 
                            class="input input-bordered" 
                            required 
                            v-model="data.grade"
                            type="text" 
                            name="grade"
                        >
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Section</span>
                            <span class="label-text-alt">(Optional)</span>
                        </label>
                        <input 
                            class="input input-bordered" 
                            required 
                            v-model="data.section"
                            type="text" 
                            name="section"
                        >
                    </div>

                    <div class="flex justify-end mt-4 gap-4">
                        <a href="<?= url('teacher') ?>" class="btn">Back</a>
                        <button :class="{'loading': isLoading}" class="btn btn-primary">Create</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
<?= component_end() ?>