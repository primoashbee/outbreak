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
                            <h4 class="page-title pull-left">Records</h4>
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
                                <h4 class="header-title">Add New Record</h4>
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
                                <form action="create_record1.php" method="POST" id="frmCreateRecord">
                                    <div class="row">

                                        <div class="form-group col">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Firstname" required="" value="<?=old('firstname')?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" aria-describedby="middlename" placeholder="Middlename" name="middlename" required=""  value="<?=old('middlename')?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Lastname" name="lastname" required=""  value="<?=old('lastname')?>">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" class ="form-control" name="birthday" value="<?=old('birthday')?>" required >
                                        </div>
                                        <div class="form-group col">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="baranggay">Barangay</label>
                                            <select name="barangay" id="barangay" class="form-control"  required="">
                                                <option value="">Please Select</option>
                                                <?php 

                                                    $brgy = getBarangay();

                                                    foreach ($brgy as $k => $v) {
                                                        
                                                        ?>

                                                <option value="<?=$v['id']?>"><?=$v['name']?></option>
                                                        <?php
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="hospital_id">Hospital</label>
                                            <select name="hospital_id" id="hospital_id" class="form-control"  required="">
                                                <option value="">Please Select</option>
                                                <?php 

                                                    $hospital = getRealHospitals(false);

                                                    foreach ($hospital as $k => $v) {
                                                        
                                                        ?>

                                                <option value="<?=$v['id']?>"><?=$v['name']?></option>
                                                        <?php
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="disease_id">Disease</label>
                                            <select name="disease_id" id="disease_id" class="form-control"  required="">
                                                <option value="">Please Select</option>
                                                <?php 

                                                    $brgy = getDiseases();

                                                    foreach ($brgy as $k => $v) {
                                                        
                                                        ?>

                                                <option value="<?=$v['id']?>"><?=$v['name']?></option>
                                                        <?php
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="date_of_sickness">Date</label>
                                            <input type="date" class="form-control" id="date_of_sickness" aria-describedby="date_of_sickness" placeholder="date_of_sickness" name="date_of_sickness" required=""  value="<?=old('date_of_sickness')?>">
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
    <div class="modal fade" id="alertModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="d_id">
               <h3> Are you sure you want to delete this record: <b><i><span id="case_id_delete"></span></i></b> ? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnDelete" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>

<?php 

    include "../includes/footer.php";

?>

    </div>
    <!-- page container area end -->
    <!-- offset area start -->

</body>
<?php
    include "../includes/scripts.php";
   
?>

<script>
    $("#barangay").val("<?=old('barangay')?>")
    $("#hospital_id").val("<?=old('hospital_id')?>")
    $("#disease_id").val("<?=old('disease_id')?>")
    $("#gender").val("<?=old('gender')?>")

    <?php 
        unset($_SESSION['msg']);
        unset($_SESSION['post_data']);
    ?>

    $('#frmCreateRecord').submit(function(e){
        $('#alertModal').modal('show')
        e.preventDefault()
    });
</script>
</html>