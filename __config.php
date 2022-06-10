<?php

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
}

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'student_portal');

define('BASE_URL', 'http://localhost/student-portal/');

define('ROLE_STUDENT', 'student');
define('ROLE_TEACHER', 'teacher');
define('ROLE_ADMIN', 'admin');

define('SUCCESS', 0);
define('ERROR_WRONG_EMAIL', 1);
define('ERROR_WRONG_PASSWORD', 2);
