<?php 
include_once('../config/config.php');
is_admin();
$sql = "SELECT * FROM ".USERS_TABLE;
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Users</title>
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
                        <h4 class="page-title">Users</h4>
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
                                <a href="#">Users</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Users Listing</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h4 class="card-title w-100">Users Listing</h4>
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
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>User Status</th>
                                                            <th>User Created At</th>
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
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['username']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['phone']; ?></td>
                                                                    <td>
                                                                        <?php 
                                                                            if($row['user_status'] == 1){
                                                                                echo '<label class="badge badge-success text-white">Active</label>';
                                                                            }else{
                                                                                echo '<label class="badge badge-danger text-white">Decline</label>';
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo date('d-m-Y',strtotime($row['user_created_at'])); ?></td>
                                                                    <td class="text-center">
                                                                        <a href="edit_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-info btn-sm" title="Click to edit"><i class="fa fa-pencil-alt"></i></a>
                                                                        <?php 
                                                                        $confirm = "confirm('Are you sure you want to change the status?')";
                                                                        $user_id = $row['user_id'];
                                                                        if($row['user_status'] == 1){
                                                                            echo '<a href="'.PROJECT_ADMIN_URL.'update_users_status.php?user_id='.$user_id.'&status=0" class="btn btn-danger btn-sm" title="Click to disable" onclick="return '.$confirm.'"><i class="fa fa-ban"></i></a>';
                                                                        }else{
                                                                            echo '<a href="'.PROJECT_ADMIN_URL.'update_users_status.php?user_id='.$user_id.'&status=1" class="btn btn-success btn-sm" title="Click to enable" onclick="return '.$confirm.'"><i class="fa fa-check"></i></a>';
                                                                        }
                                                                        ?>
                                                                        <a href="<?php echo PROJECT_ADMIN_URL.'delete_users.php?user_id='.$user_id; ?>" class="btn btn-danger btn-sm" title="Click to delete" onclick="return confirm('Are you sure you want delete this item?');"><i class="fa fa-trash"></i></a>
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