<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
}

require_once 'vendor/autoload.php';
require_once '__config.php';
require_once 'src/helpers.php';
require_once 'src/Session.php';
require_once 'src/request.php';
require_once 'src/database.php';
require_once 'src/template.php';
require_once 'src/Auth.php';
require_once 'src/AdminAuth.php';
require_once 'src/validator.php';
require_once 'src/Middleware.php';

require_once 'models/Model.php';
require_once 'models/User.php';
require_once 'models/Classes.php';

Session::init();
middleware('merge_post_data');