<?php 
include_once('../config/config.php');
if(array_key_exists('username',$_POST) && array_key_exists('name',$_POST) && !empty($_POST['username']) && !empty($_POST['name'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $admin_id = $_SESSION['admin_id']['admin_id'];
    $sql = "UPDATE ".ADMIN_TABLE." SET `username` = '$username', `name` = '$name' WHERE admin_id = $admin_id";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'Profile Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'profile.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Name and Username Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'profile.php');
    die();
}
?>