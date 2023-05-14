<?php 
include_once('config/config.php');
is_user();
if(!is_null($_GET['party_id'])){
    $party_id = $_GET['party_id'];
    $user_id = $_SESSION['user_id']['user_id'];
    if(isset($user_id) && !is_null($user_id)){
        $sql = "INSERT INTO ".USERS_VOTES." (user_id, party_id, vote_status) VALUES ('$user_id', '$party_id', 1)";
        $result = $conn->query($sql);
        if($result){
            $_SESSION['success'] = 'Vote added successfully';
            header('Location: '.PROJECT_USER_URL.'index.php');
            die();
        }else{
            echo mysqli_error($conn);
            die();
        } 
    }
    else
    {
        $_SESSION['error'] = 'Please login into your account';
        header('Location: '.PROJECT_USER_URL.'login.php');
        die();
    }
}else{
    $_SESSION['error'] = 'Party Id Field Is Required';
    header('Location: '.PROJECT_USER_URL . 'index.php');
    die();
}
?>