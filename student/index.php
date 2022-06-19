<?php 
require_once '__bootstrap.php';
$classes = Auth::user()
    ->enrolled_classes()
    ->with('teacher:id,firstname,lastname')
    ->get();
$srcs = 'enroll';
?>

<?= component_start('layouts/student', compact('srcs')) ?>

    <div class="container py-8">

        <?php if ($classes->isEmpty()) : ?>

            <div class="hero bg-base-100 rounded-lg py-8">
              <div class="hero-content text-center">
                <div class="max-w-md">
                  <h1 class="text-5xl font-bold">You don't have any classes</h1>
                  <p class="py-6">You can join a class by entering the class code provided by your teacher</p>
                  <label for='find-class-modal' class="btn btn-primary">Join now</label>
                </div>
              </div>
            </div>
            
        <?php else : ?>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-y-2">
                <h1 class="text-2xl font-semibold">Classes You Are Enrolled</h1>
                <label for="find-class-modal" class="btn btn-sm">Join Class</label>
            </div>

            <div class="divider"></div>

            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
                <?php foreach($classes as $class) : ?>
                    <?= component('components/class-card', compact('class')) ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    </div>

    <?= slot('body_end') ?>
        <input type="checkbox" id="find-class-modal" class="modal-toggle" />
        <div id='class-enroll-form' class="modal modal-bottom sm:modal-middle">
          <form @submit.prevent='handleSubmit' method="POST" class="modal-box">
            <h3 class="font-bold text-lg">Find Class</h3>

            <?= component_start('components/error', ['show_if' => 'isError']) ?>
                <ul>
                    <li v-for="error in errorMessages">{{ error }}</li>
                </ul>
            <?= component_end() ?>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Class Code</span>
                </label>
                <input 
                    class="input input-bordered" 
                    required 
                    type="text" 
                    name="code"
                    v-model="code"
                >
            </div>

            <div class="modal-action">
                <label for="find-class-modal" class="btn">Close</label>
                <button :class="{loading: isLoading}" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    <?= slot_end() ?>


<?= component_end() ?>