<?php 
include_once('config/config.php');

//If user details are filled up correctly, create new user
if(array_key_exists('username',$_POST) && array_key_exists('name',$_POST) && array_key_exists('email',$_POST) && array_key_exists('phone',$_POST) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['name'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    
    $duplicate = "select * from users where username='$username' or email='$email' or phone='$phone'";
    $duplicate_result = $conn->query($duplicate);
    
    //If user is already existant in the table, throw error
    if($duplicate_result->num_rows>0){
      $_SESSION['error'] = 'User already registered, try to login instead'; 
      header('Location: '.PROJECT_USER_URL . 'login.php');
      die();
    }
    
    //Else insert into the table and create user
    else{
      $sql = "INSERT INTO ".USERS_TABLE." (name, username, email, phone, password, user_status) VALUES ('$name','$username', '$email', '$phone', '$password', 1)";
      $result = $conn->query($sql);
      if($result){
        $_SESSION['success'] = 'Signup successful, proceed to login';
        header('Location: '.PROJECT_USER_URL.'login.php');
        die();
      }
      else{
        echo mysqli_error($conn);
        exit;
      }
    }
}
    else{
    $_SESSION['error'] = 'Error registering user'; 
    header('Location: '.PROJECT_USER_URL . 'login.php');
    die();
}
    

?>