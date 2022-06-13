<?php

require_once '__bootstrap.php';

middleware('authenticated');

Auth::logout();

redirect('login.php');