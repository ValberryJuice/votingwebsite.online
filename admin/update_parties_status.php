<?php 
include_once('../config/config.php');
if(!is_null($_GET['party_id']) && !is_null($_GET['status'])){
    $status = $_GET['status'];
    $party_id = $_GET['party_id'];
    $sql = "UPDATE ".ELECTION_PARTY_TABLE." SET `party_status` = '$status'  WHERE party_id = $party_id";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'Parties Status Updated Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'parties.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Party Id and Party Status Fields Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'parties.php');
    die();
}
?>