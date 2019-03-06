<?php 
    require("../config.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    
    if($_SESSION['user']['isAdmin']==0){
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
                            <h4 class="page-title pull-left">Disease</h4>
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
                                <h4 class="header-title">Add Discovered Disease</h4>
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
                                <form action="create_disease1.php" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="name" required="">
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" aria-describedby="description" placeholder="description" name="description" required="" rows ="5"></textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="message">Outbreak Message</label>
                                        <textarea class="form-control" id="message" aria-describedby="message" placeholder="message" name="message" required="" rows ="5"></textarea>
                                        <i> Maximum of 160 Characters Only (<span id="charLeft" class="bold">160 </span> left)</i>
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
    var char = 160;
    $("#message").on("keyup",function(){
        var total =  $(this).val().length
        $('#charLeft').html(char - total)
        
    })

</script>
</html>