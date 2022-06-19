<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?= asset('css/main.css?t=' . time()) ?>">
<link rel="icon" type="img/png" href="<?= asset('img/logo.png') ?>">

<?= isset($slot) ? $slot : ''  ?>