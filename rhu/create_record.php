<?php 
    require("../config.php");
    session_start();

    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    validateLogIn($_SESSION['user']['id']);
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
                                <div id="app">
                                <form action="create_record1.php" method="POST" id="frmCreateRecord">
                                    <div class="row">

                                        <div class="form-group col">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Firstname" required="" value="<?=old('firstname')?>" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                                        </div>
                                        <div class="form-group col">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" aria-describedby="middlename" placeholder="Middlename" name="middlename" required=""  value="<?=old('middlename')?>" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                                        </div>
                                        <div class="form-group col">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Lastname" name="lastname" required=""  value="<?=old('lastname')?>" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" class ="form-control" name="birthday" id="birthday" value="<?=old('birthday')?>" required >
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
                                    <div class="row" >
                                        <div class="form-group col-6">
                                            <label for="hospital_id">Hospital</label>
                                            <select name="hospital_id" id="hospital_id" class="form-control"  required="">
                                                <option value=""> Please select </option>
                                                <option v-for="hospital in hospitals" :value="hospital.id">{{hospital.name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="disease_id">Disease</label>
                                            <select name="disease_id" id="disease_id" class="form-control"  required="">
                                                <option value="">Please Select</option>
                                                <option v-for="disease in diseases" :value="disease.id">{{disease.name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="date_of_sickness">Date</label>
                                            <input type="date" class="form-control" id="date_of_sickness" aria-describedby="date_of_sickness" placeholder="date_of_sickness" name="date_of_sickness" id="date_of_sickness"   required=""  value="<?=old('date_of_sickness')?>">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                                </div>
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
                <input type="hidden" id ="r_id">
               <h3> Are you sure that this record is correct?</h3>
                           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnConfirm" class="btn btn-danger">Confirm</button>
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
    var isConfirmed = false;
    var app = new Vue({
      el:"#app",
      data:{
        hospitals : <?=json_encode(getRealHospitals())?>,
        diseases :  <?=json_encode(getDiseases())?>
      },
      methods: {
        addHospital(data){
            this.hospitals.push(data)
           
        },
        addDisease(data){
            this.diseases.push(data)
           
        },


      } 

    })

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');

    channel.bind('hospital.create', function(data) {
      //$("#data").html(data.text);
        app.addHospital(data);
    });
    channel.bind('disease.create', function(data) {
      //$("#data").html(data.text);
        app.addDisease(data);
    });

    $("#frmCreateRecord").submit(function(e){
        var bday = $("#birthday").val();
        var date = $("#date_of_sickness").val();
        if(isFutureDate(bday) || isFutureDate(date)){
            alert("Birthday and Date should not be in future")
            e.preventDefault();
        }

        if(!isConfirmed){
            $('#alertModal').modal('show')
            e.preventDefault()
        }
       
    })
    $("#btnConfirm").click(function(){
        isConfirmed = true
        $("#frmCreateRecord").submit();
    })
    $("#barangay").val("<?=old('barangay')?>")
    $("#hospital_id").val("<?=old('hospital_id')?>")
    $("#disease_id").val("<?=old('disease_id')?>")
    $("#gender").val("<?=old('gender')?>")

    <?php 
        unset($_SESSION['msg']);
        unset($_SESSION['post_data']);
    ?>
</script>
</html>