<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="scroll-wrapper sidebar-wrapper scrollbar-inner" style="position: relative;">
        <div class="sidebar-wrapper scrollbar-inner scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 571px;">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src="../assets/img/admin_logo.jpg" alt="..." class="avatar-img rounded-circle" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                <?php echo (isset($_SESSION['admin_id']['name']) && !is_null($_SESSION['admin_id']['name'])) ? $_SESSION['admin_id']['name'] : 'Admin'; ?>
                                <span class="user-level">Administrator</span>
                            </span>
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <?php 
                    $module = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
                    ?>
                    <li class="nav-item <?php echo (isset($module) && !is_null($module) && $module == 'index.php') ? 'active' : null ?>">
                        <a href="<?php echo PROJECT_ADMIN_URL; ?>">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($module) && !is_null($module) && $module == 'parties.php' || $module == 'add_parties.php' || $module == 'edit_parties.php') ? 'active' : null ?>">
                        <a href="<?php echo PROJECT_ADMIN_URL; ?>parties.php">
                            <i class="fas fa-users"></i>
                            <p>Parties</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($module) && !is_null($module) && $module == 'users.php' || $module == 'edit_user.php') ? 'active' : null ?>">
                        <a href="<?php echo PROJECT_ADMIN_URL; ?>users.php">
                            <i class="fas fa-user"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo (isset($module) && !is_null($module) && $module == 'votes.php') ? 'active' : null ?>">
                        <a href="<?php echo PROJECT_ADMIN_URL; ?>votes.php">
                            <i class="fas fa-id-card-alt"></i>
                            <p>Votes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="scroll-element scroll-x scroll-scrolly_visible">
            <div class="scroll-element_outer">
                <div class="scroll-element_size"></div>
                <div class="scroll-element_track"></div>
                <div class="scroll-bar ui-draggable ui-draggable-handle" style="width: 88px;"></div>
            </div>
        </div>
        <div class="scroll-element scroll-y scroll-scrolly_visible">
            <div class="scroll-element_outer">
                <div class="scroll-element_size"></div>
                <div class="scroll-element_track"></div>
                <div class="scroll-bar ui-draggable ui-draggable-handle" style="height: 548px; top: 0px;"></div>
            </div>
        </div>
    </div>
</div>
