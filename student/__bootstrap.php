<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
}

require_once '../__bootstrap.php';

middleware('students_only');