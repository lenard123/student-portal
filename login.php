<?php require_once '__bootstrap.php'; ?>
<?php middleware('guests_only') ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title('Login') ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
    <?= component_start('layouts/main') ?>

        <div class="container py-8" id="login-page">

            <div class="card mx-auto max-w-md bg-base-100">

                <div class="card-body">

                    <div class="card-title">Login to Student Portal</div>

                    <form @submit.prevent="login" method="POST">

                        <?php if (get('status') === 'REGISTERED') : ?>
                        <div v-if="!hideSuccessAlert" class="alert alert-success mt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>Successfully Registered</span>
                            </div>
                        </div>
                        <?php endif ?>

                        <div v-cloak v-if="isError" class="alert alert-error shadow-lg mt-4 text-sm">
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <ul>
                                    <li v-for="error in errorMessages">{{ error }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                v-model="email"
                                type="email" 
                                name="email"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                v-model="password"
                                type="password" 
                                name="password"
                            >
                        </div>

                        <div class="form-control">
                          <label class="label cursor-pointer">
                            <span class="label-text">Remember me</span> 
                            <input type="checkbox" checked="checked" class="checkbox checkbox-xs" />
                          </label>
                        </div>

                        <div class="form-control mt-4">
                            <button 
                                type="submit" 
                                class="btn btn-primary"
                                :class="{'loading': isLoading}"
                            >Submit</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    <?= component_end() ?>
    <?= component('layouts/scripts', ['srcs' => 'login']) ?>
</body>
</html>