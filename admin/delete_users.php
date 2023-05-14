<?php 
include_once('../config/config.php');
if(!is_null($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM ".USERS_TABLE." WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'User Deleted Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'users.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Party Id Field Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'users.php');
    die();
}
?>