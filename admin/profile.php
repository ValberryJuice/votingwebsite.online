<?php 
include_once('../config/config.php');
is_admin();
$admin_id = $_SESSION['admin_id']['admin_id'];
$sql = "SELECT * FROM ".ADMIN_TABLE." WHERE `admin_id` = '$admin_id'";
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
	<title>Profile</title>
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
						<h4 class="page-title">Profile</h4>
					</div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-with-nav">
                                <div class="card-header">
                                    <div class="row row-nav-line">
                                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" id="profile-tab"aria-selected="false">Profile</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Update Password</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="card-body">
                                            <form id="profile-frm" action="<?php echo PROJECT_ADMIN_URL ?>update_profile.php" method="post" enctype="multipart/form-data">
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo (isset($row['name']) && !is_null($row['name'])) ? $row['name'] : 'Admin'; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo (isset($row['username']) && !is_null($row['username'])) ? $row['username'] : 'admin'; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right mt-3 mb-3">
                                                    <button class="btn btn-success" type="submit" id="profile-btn">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                        <div class="card-body">
                                            <form action="<?php echo PROJECT_ADMIN_URL ?>update_password.php" method="post" id="password-frm">
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" id="new_password" name="newpassword" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right mt-3 mb-3">
                                                    <button class="btn btn-success" id="update-password">Save</button>
                                                    <!-- <button class="btn btn-danger">Reset</button> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile card-secondary">
                                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                    <div class="profile-picture">
                                        <div class="avatar avatar-xl">
                                            <img src="../assets/img/admin_logo.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-profile text-center">
                                        <div class="name"><?php echo (isset($_SESSION['admin_id']['name']) && !is_null($_SESSION['admin_id']['name'])) ? $_SESSION['admin_id']['name'] : 'Admin'; ?></div>
                                        <div class="job"><?php echo (isset($_SESSION['admin_id']['username']) && !is_null($_SESSION['admin_id']['username'])) ? $_SESSION['admin_id']['username'] : 'admin'; ?></div>
                                        <div class="social-media d-none">
                                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                            </a>
                                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                            </a>
                                        </div>
                                        <div class="view-profile d-none">
                                            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none">
                                    <div class="row user-stats text-center">
                                        <div class="col">
                                            <div class="number">125</div>
                                            <div class="title">Post</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">25K</div>
                                            <div class="title">Followers</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">134</div>
                                            <div class="title">Following</div>
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