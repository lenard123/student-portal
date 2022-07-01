<?php

require_once '__bootstrap.php';

if (isset($_GET['path'])) {
    Storage::download(get('path'), get('name', get('path')));
    exit();
}