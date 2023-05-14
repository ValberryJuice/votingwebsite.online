<?php 
include_once('config/config.php');
is_admin();
if(array_key_exists('user_id',$_SESSION)){
    $user_login = PROJECT_USER_URL.'login.php';
    unset($_SESSION['user_id']);
    $_SESSION['success'] = 'Logged Out Successfully';
    header("Location: $user_login");
}
?>