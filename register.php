<?php require_once '__bootstrap.php'; ?>
<?php middleware('guests_only') ?>
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

                    <form @submit.prevent="handleSubmit">

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
                                <span class="label-text">Register as</span>
                            </label>
                            <select 
                                v-model="data.role" 
                                class="select select-bordered w-full">
                              <option value="<?= User::ROLE_STUDENT ?>">Student</option>
                              <option value="<?= User::ROLE_TEACHER ?>">Teacher</option>
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">First Name</span>
                            </label>
                            <input 
                                v-model="data.firstname"
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
                                v-model="data.middlename"
                                class="input input-bordered" 
                                type="text" 
                                name="middlename"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Last Name</span>
                            </label>
                            <input 
                                v-model="data.lastname"
                                class="input input-bordered" 
                                required 
                                type="text" 
                                name="lastname"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Gender</span>
                            </label>
                            <select 
                                v-model="data.gender" 
                                class="select select-bordered w-full">
                              <option value="<?= User::GENDER_MALE ?>">Male</option>
                              <option value="<?= User::GENDER_FEMALE ?>">Female</option>
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Birthday</span>
                            </label>
                            <input 
                                v-model="data.birthday"
                                class="input input-bordered" 
                                required 
                                type="date" 
                                name="birthday"
                            >
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input 
                                v-model="data.email"
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
                                v-model="data.password"
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
                                v-model="data.password_confirmation"
                                class="input input-bordered" 
                                required 
                                type="password" 
                                name="password_confirmation"
                            >
                        </div>

                        <div class="form-control mt-4">
                            <button type="submit" :class="{'loading': isLoading}" class="btn btn-primary">Submit</button>
                        </div>


                    </form>

                </div>
            </div>

        </div>

    <?= component_end() ?>
    <?= component('layouts/scripts', [
        'libs' => ['axios'],
        'srcs' => ['register']
    ]) ?>
</body>
</html>