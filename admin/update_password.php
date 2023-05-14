<?php 
include_once('../config/config.php');
if(array_key_exists('newpassword',$_POST) && array_key_exists('confirmpassword',$_POST) && !empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])){
    $confirmpassword = md5($_POST['confirmpassword']);
    $admin_id = $_SESSION['admin_id']['admin_id'];
    $sql = "UPDATE ".ADMIN_TABLE." SET `password` = '$confirmpassword' WHERE admin_id = $admin_id";
    $result = $conn->query($sql);
    if($result){
        session_destroy();
        $_SESSION['success'] = 'Password Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'login.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Password and Confirm Password Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'profile.php');
    die();
}
?>