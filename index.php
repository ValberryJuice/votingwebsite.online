<?php 
include_once('config/config.php');
is_user();
$sql = "SELECT * FROM ".ELECTION_PARTY_TABLE." WHERE party_status = 1";
$result = $conn->query($sql);

$user_id = $_SESSION['user_id']['user_id'];
$vote_sql = "SELECT usr_vote_id FROM ".USERS_VOTES." WHERE `user_id` = '$user_id'";
$vote_result = $conn->query($vote_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php  require_once('includes/css.php'); ?>
</head>
<body>
	<div class="wrapper">
        <?php  include_once('includes/header.php'); ?>
        <?php  include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php  include_once('includes/alerts.php'); ?>
                    <div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
                    <div class="row justify-content-center">
                        <?php
                        if($vote_result->num_rows == 0){
                            $i=1;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-sm-3 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <?php 
                                                    if(isset($row['party_logo']) && !is_null($row['party_logo']) && !empty($row['party_logo']))
                                                    {
                                                        ?>
                                                        <img src="<?php echo PROJECT_URL; ?>/uploads/<?php echo $row['party_logo']; ?>" class="img-fluid mt-3" style="height:80px;width:80px;s" />
                                                        <?php
                                                    }
                                                ?>
                                                <h3 class="mt-3"><?php echo $row['party_name']; ?></h3>
                                                <p class="mt-3"><?php echo $row['party_description']; ?></p>
                                                <a href="<?php echo PROJECT_URL; ?>store_vote.php?party_id=<?php echo $row['party_id']; ?>" onclick="return confirm('Are you sure you want to vote this party?');" class="btn btn-info btn mt-2">Vote Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                }
                            }
                        } 
                        else
                        {
                            ?>
                            <div class="col-md-8 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>Thank You!</h2>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success mt-4" width="75" height="75"
                                            fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                        </svg>
                                        <h2 class="mt-3">You Have Already Voted</h2>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  require_once('includes/scripts.php'); ?>
</body>
</html>