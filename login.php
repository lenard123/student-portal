<?php require_once '__bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title('Login') ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
    <?= component_start('layouts/main') ?>

        <div class="container py-8">

            <div class="card mx-auto max-w-md bg-base-100">

                <div class="card-body">

                    <div class="card-title">Login to Student Portal</div>

                    <form>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    <?= component_end() ?>
</body>
</html>