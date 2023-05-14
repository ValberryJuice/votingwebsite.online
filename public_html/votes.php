<?php 
include_once('config/config.php');
is_user();
$sql = "SELECT a.party_id, COUNT(a.usr_vote_id) as total_votes,b.party_name,b.party_logo,b.party_description FROM `".USERS_VOTES."`as a INNER JOIN `".ELECTION_PARTY_TABLE."` as b ON a.party_id = b.party_id WHERE b.party_status = 1 AND a.user_id !='' AND a.user_id IS NOT NULL GROUP BY a.party_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Votes</title>
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
                    <?php include_once('includes/alerts.php'); ?>
                    <div class="page-header">
                        <h4 class="page-title">Votes</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Votes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h4 class="card-title w-100">Votes Listing</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Party Name</th>
                                                            <th>Party Logo</th>
                                                            <th>Total Votes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i=1; 
                                                        if ($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $row['party_name']; ?></td>
                                                                    <td><?php 
                                                                        if(isset($row['party_logo']) && !is_null($row['party_logo']) && !empty($row['party_logo']))
                                                                        {
                                                                            ?>
                                                                            <img src="<?php echo PROJECT_URL; ?>/uploads/<?php echo $row['party_logo']; ?>" class="img-fluid mt-3" style="height:80px;width:80px;s" />
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <img src="<?php echo PROJECT_URL; ?>/assets/img/profile.jpg" class="img-fluid mt-3" style="height:80px;width:80px;s" />
                                                                            <?php
                                                                        }
                                                                    ?></td>
                                                                    <td><?php echo $row['total_votes']; ?></td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  require_once('includes/scripts.php'); ?>
</body>
</html>