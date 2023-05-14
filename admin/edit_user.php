<?php 
include_once('../config/config.php');
is_admin();
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM ".USERS_TABLE." WHERE `user_id` = '$user_id'";
$result = $conn->query($sql);
$row = array();
if($result){
    if($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit User</title>
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
                                <a href="#">Edit User</a>
                            </li>
                        </ul>
                    </div>
                    <?php include_once('includes/alerts.php'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo PROJECT_ADMIN_URL ?>update_user.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" />
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h4 class="card-title w-100">Edit User</h4>
                                            <a href="<?php echo PROJECT_ADMIN_URL; ?>users.php" class="btn btn-primary btn-sm">Users Listing</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $row['phone']; ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action text-center">
                                        <button class="btn btn-success" type="submit" id="ecomm-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  require_once('includes/scripts.php'); ?>
</body>
</html>