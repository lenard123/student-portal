<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?= asset('css/main.css?t=' . filemtime(ROOT_PATH . '/assets/css/main.css')) ?>">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap">
<link rel="icon" type="img/png" href="<?= asset('img/logo.png') ?>">

<?= isset($slot) ? $slot : ''  ?>