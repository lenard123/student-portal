<?php require_once '__bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title('Contact Us') ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
    <?= component('layouts/navbar') ?>

    <main class="container py-12">
        <div class="text-center">
            <h1 class="text-2xl font-bold">Contact Us</h1>
            <div>If you have a question or inquiries feel free to leave a message.</div>
        </div>


        <form class="mt-4 max-w-screen-sm mx-auto">
            <div class="grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name: </span>
                    </label>
                    <input type="text" placeholder="Input your name here" class="input input-bordered w-full" />
                </div>


                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email: </span>
                    </label>
                    <input type="text" placeholder="Input your email here" class="input input-bordered w-full" />
                </div>
            </div>


            <div class="form-control">
                <label class="label">
                    <span class="label-text">Message: </span>
                </label>
                <textarea type="text" placeholder="Write something" class="textarea textarea-bordered w-full" ></textarea>
            </div>

            <div class="form-control mt-4">
                <button class="btn btn-primary">Send</button>
            </div>

        </form>

    </main>

    <?= component('layouts/footer') ?>
    <?= component('layouts/scripts') ?>
</body>
</html>