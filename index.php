<?php require_once '__bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= page_title() ?></title>
    <?= component('layouts/headers') ?>
</head>
<body>
  <?= component_start('layouts/main') ?>
    <div class="hero py-16 bg-base-200">
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-5xl font-bold">Hello there</h1>
          <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
          <button class="btn btn-primary">Get Started</button>
        </div>
      </div>
    </div>
  <?= component_end() ?>
</body>
</html>