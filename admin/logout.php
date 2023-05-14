<?php 
include_once('../config/config.php');
is_admin();
if(array_key_exists('admin_id',$_SESSION)){
    $admin_login = PROJECT_ADMIN_URL.'login.php';
    unset($_SESSION['admin_id']);
    $_SESSION['success'] = 'Logged Out Successfully';
    header("Location: $admin_login");
}
?>