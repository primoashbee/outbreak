<?php 
    require("../config.php");
        session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    if($_SESSION['user']['isAdmin']==0){
        header('location:../index.php');   
    }

  $xml=simplexml_load_file("setup.xml");
  
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
<style>
  .nav-link{
    color:black;
  }


/* The switch - the box around the slider */
.switch {
  position: absolute;
  display: inline-block;
  width: 60px;
  height: 34px;
 
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
                            <h4 class="page-title pull-left">Administration Setup</h4>
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
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                  <div class="card card-bordered">
                    <form action="setup1.php" method="post">
                      <div class="card-body">
                          <h5 class="title">Administration</h5>
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
                          <table class="table">
                            <thead>
                            <th>Type</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td>SMS</td>
                                <td>
                                  <label class="switch">
                                  <input type="checkbox" class="primary" id="sms" name ="sms">
                                  <span class="slider round"></span>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                      
                          <table class="table">
                            <thead>
                            <th>Baranggay</th>
                            <th>Number</th>
                            </thead>
                            <tbody>
                              <?php 
                                sendAlert(1,4,21);
                                $brgy = getBarangay();
                              ?>
                              <?php 
                                  foreach ($brgy as $key => $value) { ?>
                              <tr>
                                
                                <td><?=$value['name']?></td>
                                <td><input type="text" class="form-control" name="brgy[<?=$value['id']?>]" value="<?=$value['contact']?>"></td>
                              
                              </tr>
                                <?php }
                                ?>
                            </tbody>
                          </table>
                        <div class="text-right">
                        <button class="btn btn-primary text-right" >Submit</button>
                        </div>
                      </div>

                      </form>
                  </div>

                   </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->

                <!-- row area start-->
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
?>

<script>
  $(function(){
    <?php 

      if($xml->sms->activated=="true"){
        ?>
        $('#sms').prop("checked",true)
        <?php
      }else{
        ?>
        $('#sms').prop("checked",false)
        <?php
      } 
    ?>
  })
</script>


</html>

<?php 
unset($_SESSION['post_data']);

?>