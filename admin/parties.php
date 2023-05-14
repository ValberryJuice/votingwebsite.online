<?php 
include_once('../config/config.php');
is_admin();
$sql = "SELECT * FROM ".ELECTION_PARTY_TABLE;
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Parties</title>
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
                        <h4 class="page-title">Parties</h4>
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
                                <a href="#">Parties</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Parties Listing</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h4 class="card-title w-100">Parties Listing</h4>
                                        <a href="<?php echo PROJECT_ADMIN_URL; ?>add_parties.php" class="btn btn-primary btn-sm">Add Party</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Party Name</th>
                                                            <th>Party Logo</th>
                                                            <th>Party Description</th>
                                                            <th>Party Status</th>
                                                            <th>Party Created At</th>
                                                            <th>Party Updated At</th>
                                                            <th>Action</th>
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
                                                                    <td><?php echo $row['party_description']; ?></td>
                                                                    <td>
                                                                        <?php 
                                                                            if($row['party_status'] == 1){
                                                                                echo '<label class="badge badge-success text-white">Active</label>';
                                                                            }else{
                                                                                echo '<label class="badge badge-danger text-white">Decline</label>';
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo date('d-m-Y',strtotime($row['party_created_at'])); ?></td>
                                                                    <td><?php echo date('d-m-Y',strtotime($row['party_updated_at'])); ?></td>
                                                                    <td class="text-center">
                                                                        <a href="edit_parties.php?party_id=<?php echo $row['party_id']; ?>" class="btn btn-info btn-sm" title="Click to edit"><i class="fa fa-pencil-alt"></i></a>
                                                                        <?php 
                                                                        $confirm = "confirm('Are you sure you want to change the status?')";
                                                                        $party_id = $row['party_id'];
                                                                        if($row['party_status'] == 1){
                                                                            echo '<a href="'.PROJECT_ADMIN_URL.'update_parties_status.php?party_id='.$party_id.'&status=0" class="btn btn-danger btn-sm" title="Click to disable" onclick="return '.$confirm.'"><i class="fa fa-ban"></i></a>';
                                                                        }else{
                                                                            echo '<a href="'.PROJECT_ADMIN_URL.'update_parties_status.php?party_id='.$party_id.'&status=1" class="btn btn-success btn-sm" title="Click to enable" onclick="return '.$confirm.'"><i class="fa fa-check"></i></a>';
                                                                        }
                                                                        ?>
                                                                        <a href="<?php echo PROJECT_ADMIN_URL.'delete_parties.php?party_id='.$party_id; ?>" class="btn btn-danger btn-sm" title="Click to delete" onclick="return confirm('Are you sure you want delete this item?');"><i class="fa fa-trash"></i></a>
                                                                    </td>
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