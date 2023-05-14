<?php 
session_start();
include('constants.php');

$servername = "localhost";
$username = "u515978506_vote";
$password = ".TA4WrbQ84nPggF";
$dbname = "u515978506_vote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function is_admin(){
    if(!array_key_exists('admin_id',$_SESSION)){
        $admin_login = PROJECT_ADMIN_URL.'login.php';
        header("Location: $admin_login");
    }
}

function is_user(){
    if(!array_key_exists('user_id',$_SESSION)){
        $user_login = PROJECT_USER_URL.'login.php';
        header("Location: $user_login");
    }
}
?>