<?php 
include_once('../config/config.php');
if(!is_null($_GET['user_id']) && !is_null($_GET['status'])){
    $status = $_GET['status'];
    $user_id = $_GET['user_id'];
    $sql = "UPDATE ".USERS_TABLE." SET `user_status` = '$status'  WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'Users Status Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'users.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'User Id and User Status Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'users.php');
    die();
}
?>