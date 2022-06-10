<?php

foreach($_GET as $key => $value) {
    $_GET[$key] = sanitize_input($value);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach($_POST as $key => $value) {
        $_POST[$key] = sanitize_input($value);
    }
}
