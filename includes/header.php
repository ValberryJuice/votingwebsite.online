<div class="main-header" data-background-color="green">
    <!-- Logo Header -->
    <div class="logo-header">
        <a href="<?php echo PROJECT_URL; ?>" class="logo">
            <h4 class="navbar-brand text-white">User</h4>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
        <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item toggle-nav-search hidden-caret">
                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="assets/img/profile.jpg" class="avatar-img rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded" /></div>
                                <div class="u-text">
                                    <h4><?php echo (isset($_SESSION['user_id']['name']) && !is_null($_SESSION['user_id']['name'])) ? $_SESSION['user_id']['name'] : 'Admin'; ?></h4>
                                    <p class="text-muted"><?php echo (isset($_SESSION['user_id']['username']) && !is_null($_SESSION['user_id']['username'])) ? $_SESSION['user_id']['username'] : 'admin'; ?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo PROJECT_USER_URL; ?>logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
