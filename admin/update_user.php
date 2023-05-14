<?php 
include_once('../config/config.php');
if(array_key_exists('name',$_POST) && array_key_exists('username',$_POST) && array_key_exists('email',$_POST) && array_key_exists('phone',$_POST) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email'])  && !empty($_POST['phone'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if(!is_null($_POST['password'])){
        $password = md5($_POST['password']);
        $sql = "UPDATE ".USERS_TABLE." SET `username` = '$username', `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE user_id = $user_id";
    }else{
        $sql = "UPDATE ".USERS_TABLE." SET `username` = '$username', `name` = '$party_description', `email` = '$email', `phone` = '$phone' WHERE user_id = $user_id";
    }
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'User Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'edit_user.php?user_id='.$user_id);
        die();
    }else{
        echo mysqli_error($conn);
        die();
    }
}else{
    $_SESSION['error'] = 'Some Input Fields Are Missing!';
    header('Location: '.PROJECT_ADMIN_URL . 'users.php');
    die();
}
?>