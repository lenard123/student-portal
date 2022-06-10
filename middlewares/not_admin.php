<?php

if (is_admin_login()) {
    redirect('admin-dashboard.php');
}