<?php

$ROOT_PATH = dirname($_SERVER['SCRIPT_FILENAME']);

require_once 'vendor/autoload.php';
require_once '__config.php';
require_once 'src/helpers.php';
require_once 'src/session.php';
require_once 'src/request.php';
require_once 'src/database.php';
require_once 'src/template.php';
require_once 'src/auth.php';

require_once 'models/Model.php';
require_once 'models/User.php';

//Global middleware
middleware('sanitize_input');