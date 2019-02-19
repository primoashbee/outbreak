<?php 
	require("config.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 
	include "includes/head.php";
?>

</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->


    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="login1.php" method="POST">
                    <div class="login-form-head">
                        <h4>OUTBREAK MONITORING</h4>
                        
                        <img src= "\assets\PUBLIC WEBSITE\images\logo.png"/ style="max-height: 40%;max-width: 40%">
                        <p>Please enter your credentials</p>
                    </div>

                    <div class="login-form-body">
                    <?php 
                            if(isset($_SESSION['msg'])){
                    ?>
                    <div class="alert alert-danger" style="margin-top: -40px; margin-left:-40px;margin-right:-40px">
                      <h4><center><strong><?=$_SESSION['msg']['msg']?></strong></center></h4>
                    </div>
                    <?php
                            }

                    ?>
                        <div class="form-gp focused has-danger">
                            <label for="username">Username</label>
                            <input type="text"  id="username" name="username" value="<?=old('username')?>">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp focused">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- page container area end -->
    <!-- offset area start -->

</body>
<?php
	include "includes/scripts.php";
    unset($_SESSION['post_data']);
    unset($_SESSION['msg']);
?>
</html>