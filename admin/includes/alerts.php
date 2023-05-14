<?php 
if(isset($_SESSION['error']) && !is_null($_SESSION['error']) && !empty($_SESSION['error']))
{
    ?>
    <div class="alert alert-danger alert-dismissible">
        <a class="close" data-dismiss="alert"><i class="fas fa-times" style="top:5px;position:absolute;right:10px;"></i></a>
        <?php echo $_SESSION['error']; ?>
    </div>
    <?php
    unset($_SESSION['error']);
}

if(isset($_SESSION['success']) && !is_null($_SESSION['success']) && !empty($_SESSION['success']))
{
    ?>
    <div class="alert alert-success alert-dismissible">
        <a class="close" data-dismiss="alert"><i class="fas fa-times" style="top:5px;position:absolute;right:10px;"></i></a>
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php
    unset($_SESSION['success']);
}
?>