<?php require_once '__bootstrap.php'; ?>
<?php middleware('guests_only') ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title() ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
  <?= component_start('layouts/main') ?>
    <section id="home" class="hero py-16 bg-base-200">
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-5xl font-bold">Hello there</h1>
          <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
          <button class="btn btn-primary">Get Started</button>
        </div>
      </div>
    </section>

    <section id="about">

    </section>

    <section id="contact" class="container py-12">
        <div class="text-center">
            <h1 class="text-2xl font-bold">Contact Us</h1>
            <div>If you have a question or inquiries feel free to leave a message.</div>
        </div>


        <form class="mt-4 max-w-screen-sm mx-auto">
            <div class="grid sm:grid-cols-2 sm:gap-4">
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

    </section>

  <?= component_end() ?>
</body>
</html>