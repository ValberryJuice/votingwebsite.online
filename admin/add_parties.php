<?php 
include_once('../config/config.php');
is_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Add Parties</title>
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
                                <a href="#">Create Listing</a>
                            </li>
                        </ul>
                    </div>
                    <?php include_once('includes/alerts.php'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo PROJECT_ADMIN_URL ?>store_parties.php" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h4 class="card-title w-100">Create Parties</h4>
                                            <a href="<?php echo PROJECT_ADMIN_URL; ?>parties.php" class="btn btn-primary btn-sm">Parties Listing</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Party Name</label>
                                                    <input type="text" class="form-control" id="party_name" name="party_name" placeholder="Party Name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Party Logo</label>
                                                    <input type="file" class="form-control" id="party_logo" name="party_logo" placeholder="Party Logo" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Party Description</label>
                                                    <textarea class="form-control" id="party_description" name="party_description" placeholder="Party Description" required></textarea>
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