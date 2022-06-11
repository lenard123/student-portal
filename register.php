<?php require_once '__bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title('Register') ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
    <?= component_start('layouts/main') ?>

        <div class="container py-8">

            <div id='register-page' class="card mx-auto max-w-md bg-base-100">

                <div class="card-body">

                    <div class="card-title">Register to Student Portal</div>

                    <form>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Register as</span>
                            </label>
                            <select class="select select-bordered w-full">
                              <option>Student</option>
                              <option>Teacher</option>
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">First Name</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                type="text" 
                                name="firstname"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Middle Name</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                type="text" 
                                name="middlename"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Last Name</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                type="text" 
                                name="lastname"
                            >
                        </div>

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
                            <label class="label">
                                <span class="label-text">Re-enter Password</span>
                            </label>
                            <input 
                                class="input input-bordered" 
                                required 
                                type="password" 
                                name="password_confirmation"
                            >
                        </div>

                        <div class="form-control mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    <?= component_end() ?>
    <?= component('layouts/scripts', ['src' => 'register']) ?>
</body>
</html>