<?php require_once '__bootstrap.php' ?>
<?php require 'middlewares/not_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title('Admin Login') ?></title>

    <?= component('layouts/headers') ?>

</head>
<body class="bg-slate-300">

    <main class="container py-16" id='admin-login-page'>
        <div class="bg-white w-full mx-auto max-w-[400px] rounded-xl">

            <div class="py-8">
                <a href="<?= url() ?>">
                    <img class="mx-auto" src="<?= asset('img/logo.png') ?>" height="60" width="60">
                </a>
            </div>

            <div class="text-center font-bold text-2xl text-white bg-primary py-4">
                Admin Login
            </div>

            <form @submit.prevent="login" class="p-6 pb-12" method="POST">

                <div v-cloak v-if="isError" class="alert alert-error shadow-lg text-red-800">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ errorMessage }}</span>
                    </div>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input v-model='email' type="email" name="email" class="input input-bordered" required>
                </div>

                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input v-model='password' type="password" name="password" class="input input-bordered">
                </div>

                <div class="form-control">
                  <label class="label cursor-pointer">
                    <span class="label-text">Remember me</span> 
                    <input type="checkbox" checked="checked" class="checkbox checkbox-xs" />
                  </label>
                </div>

                <div class="form-control mt-4">
                    <button :class="{'loading': isLoading}" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </main>
    <?= component('layouts/scripts', ['src' => 'admin-login']) ?>
</body>
</html>