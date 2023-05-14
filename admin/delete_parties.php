<?php 
include_once('../config/config.php');
if(!is_null($_GET['party_id'])){
    $party_id = $_GET['party_id'];
    $sql = "DELETE FROM ".ELECTION_PARTY_TABLE." WHERE party_id = $party_id";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['success'] = 'Parties Deleted Successfully';
        header('Location: '.PROJECT_ADMIN_URL.'parties.php');
        die();
    }else{
        echo mysqli_error($conn);
        exit;
    }
}else{
    $_SESSION['error'] = 'Party Id Field Are Required';
    header('Location: '.PROJECT_ADMIN_URL . 'parties.php');
    die();
}
?>