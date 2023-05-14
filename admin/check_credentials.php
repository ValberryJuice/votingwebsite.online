<?php 
include_once('../config/config.php');
if(array_key_exists('username',$_POST) && array_key_exists('password',$_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM ".ADMIN_TABLE." WHERE `username` = '$username' AND `password` = '$password' AND admin_status = 1";
    $result = $conn->query($sql);
    if($result){
        if($result->num_rows > 0){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['admin_id'] = $row;
            $_SESSION['success'] = 'Logged In Successfully';
            header('Location: '.PROJECT_ADMIN_URL.'index.php');
            die();
        }else{
            $_SESSION['error'] = 'Invalid Username Or Password';
            header('Location: '.PROJECT_ADMIN_URL . 'login.php');
            die();
        }
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Username and Password Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'login.php');
    die();
}
?>