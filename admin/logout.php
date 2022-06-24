<?php 

require_once '__bootstrap.php';

AdminAuth::logout();

redirect('admin/login.php');