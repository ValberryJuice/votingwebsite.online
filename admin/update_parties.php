<?php 
include_once('../config/config.php');
if(array_key_exists('party_name',$_POST) && array_key_exists('party_description',$_POST) && !empty($_POST['party_name']) && !empty($_POST['party_description'])){
    $party_description = $_POST['party_description'];
    $party_name = $_POST['party_name'];
    $party_id = $_POST['party_id'];
    $file_name = null;
    if(isset($_FILES['party_logo']) && !is_null($_FILES['party_logo'])){
        $file_name = $_FILES['party_logo']['name'];
        $file_size =$_FILES['party_logo']['size'];
        $file_tmp =$_FILES['party_logo']['tmp_name'];
        $file_type=$_FILES['party_logo']['type'];
        move_uploaded_file($file_tmp,"../uploads/".$file_name);
    }
    if(isset($file_name) && !empty($file_name) && !is_null($file_name)){
        $sql = "UPDATE ".ELECTION_PARTY_TABLE." SET `party_name` = '$party_name', `party_description` = '$party_description', `party_logo` = '$file_name' WHERE party_id = $party_id";
    }else{
        $sql = "UPDATE ".ELECTION_PARTY_TABLE." SET `party_name` = '$party_name', `party_description` = '$party_description' WHERE party_id = $party_id";
    }
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'Parties Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'edit_parties.php?party_id='.$party_id);
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Party Name and Party Description Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'parties.php');
    die();
}
?>