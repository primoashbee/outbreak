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
                                <a class="dropdown-item" href="#changePass">Change Password</a>
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
                                <h4 class="header-title">List of Accounts</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">

                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">CASE #</th>
                                                    <th scope="col">NAME</th>
                                                    <th scope="col">GENDER</th>
                                                    <th scope="col">BARANGAY</th>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">DATE</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            <?php 
                                              $records = getPatientRecords();

                                              foreach($records as $record){
                                            ?>
                                                <tr>
                                                    <th scope="row"><?=$record['case_id']?></th>
                                                    <td><?=ucfirst($record['full_name'])?></td>
                                                    <td><?=ucfirst($record['gender'])?></td> 
                                                    <td><?=ucfirst($record['barangay_name'])?></td> 
                                                    <td><?=ucfirst($record['disease_name'])?></td> 
                                                    <td><?=ucfirst($record['date_of_sickness'])?></td> 
                                                    <td>
                                                        <button type=" button" id="<?=$record['id']?>" class="updateAccount btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                        <button type="button" id="<?=$record['id']?>" username="<?=$record['username']?>" class="deleteAccount btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>

                                                    </td>
                                                </tr>
                                            <?php 

                                            }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

    <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="diseaseName"></span></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" id="username_id">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="Username" readonly="">
                    </div>
                    <div class="row">
                    <div class="form-group col">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="First Name" name="firstname" required="">
                    </div>
                    <div class="form-group col">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Last Name"name="lastname"  required="">
                    </div>

                    </div>
                    <div class="row">
                    <div class="form-group col">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"  required="">
                    </div>
                    <div class="form-group col">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password" required="">
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnUpdate" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="alertModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="d_id">
               <h3> Are you sure you want to delete this Account <b><i><span id="usernameDel"></span></i></b>? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnDelete" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>
</body>
<?php
    include "../includes/scripts.php";
    unset($_SESSION['post_data']);
?>
<script>
      
</script>
</html>