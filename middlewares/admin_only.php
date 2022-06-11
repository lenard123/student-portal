<?php

if (! is_admin_login() ) {
    redirect('admin/login.php');
}