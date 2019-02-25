<?php 
    require("../config.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
<?php 
    include "../includes/head.php";
?>

</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->

    <div class="page-container">
<?php 

    include "../includes/sidebar.php";

?>

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                 
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Accounts</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?=getName()?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item changePassword" href="#changePass">Change Password</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">

                <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Add New Account</h4>
                                <?php 
                                if(isset($_SESSION['msg'])){
                                    if($_SESSION['msg']['isSuccess']){


                                        ?>
                                        <div class="alert alert-primary alert-success" role="alert">
                                            <h2><strong>Heads up!</strong> <?=$_SESSION['msg']['message']?></h2>
                                        </div>

                                        <?php
                                    }else{
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <h2><strong>Oh no!</strong> <?=$_SESSION['msg']['message']?></h2>
                                        </div>

                                        <?php

                                    }


                                }


                                ?>
                                <form action="create_account1.php" method="POST" id="frmCreateAccount">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="Username" value ="<?=old('username')?>" required="">
                                    </div>
                                    <div class="row">
                                    <div class="form-group col">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="First Name" name="firstname" value ="<?=old('firstname')?>" required="">
                                    </div>
                                    <div class="form-group col">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Last Name"name="lastname"  value ="<?=old('lastname')?>" required="">
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="form-group col">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"  required="">
                                    </div>
                                    <div class="form-group col">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" required="">
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->

<?php 

    include "../includes/footer.php";

?>

    </div>
    <!-- page container area end -->
    <!-- offset area start -->

</body>
<?php
    include "../includes/scripts.php";
    unset($_SESSION['msg']);
    unset($_SESSION['post_data']);
?>

<script>
    
    $('#frmCreateAccount').submit(function(e){
        alert();

        var p1 = $('#password').val()
        var p2 = $('#password_confirmation').val()

        if(ifHasPassword(p1,p2)){

            if(passwordConfirmed(p1,p2)){
            
                if(validatePassword(p1)){

                }
                alert('Password should have one number, one lowercase and one uppercase letter')
                e.preventDefault()
                return;
              
            }
            alert("Password must be confirmed")
            e.preventDefault()
            return;
        }
        alert('Fill up both field')
        e.preventDefault()
        return;
    })

</script>
</html>