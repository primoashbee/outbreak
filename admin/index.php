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
<style>
  .nav-link{
    color:black;
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
                            <h4 class="page-title pull-left">Dashboard</h4>
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
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <select name="year" id="year" class="form-control">
                              
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                            </select>
                              <div class="card-body">
                                  <h4 class="header-title">Map Status</h4>
                                  <iframe src="map.php" type="" width="100%" height="550px" id="embedMap"></iframe>
                             </div>
                          </div>
                        </div>                       
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-controls="yearly" aria-selected="false">Yearly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  " id="weekly-tab" data-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="true">Weekly</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="daily-tab" data-toggle="tab" href="#daily" role="tab" aria-controls="daily" aria-selected="true">Daily</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade active show" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                                          <h4 class="header-title">Yearly Graph</h4>
                                          <iframe src="graph.php" type="" width="100%" height="500px" id="embedGraphYear"></iframe>                                    </div>
                                    <div class="tab-pane fade" id="monthly"" role="tabpanel" aria-labelledby="monthly-tab">
                                        <h4 class="header-title">Monthly Graph</h4>
                                          <iframe src="graph.php" type="" width="100%" height="500px" id="embedGraphMonth"></iframe>    
                                    </div>
                                    <div class="tab-pane fade " id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                                       <h4 class="header-title">Weekly Graph</h4>
                                          <iframe src="graph_week.php" type="" width="100%" height="500px" id="embedGraphWeek"></iframe>    
                                    </div>
                                    <div class="tab-pane fade " id="daily" role="tabpanel" aria-labelledby="daily-tab">
                                       <h4 class="header-title">Daily Graph</h4>
                                          <iframe src="graph.php" type="" width="100%" height="500px" id="embedGraphDay"></iframe>    
                                    </div>
                                </div>
                            </div>
                        </div>
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
var year;
$(function(){
  <?php 
  $year =2019;
  if(isset($_GET['year'])){ 
  $year = $_GET['year']; 
  } ?>



  var year = <?=$year?>; 
  $('#year').val(year)
  $('#embedMap').attr("src","map.php?year="+year)
  $('#embedGraphYear').attr("src","graph.php?year="+year)
  $('#embedGraphMonth').attr("src","graph.php?year="+year)
  $('#embedGraphWeek').attr("src","graph_week.php?year="+year)
})

 $('#year').change(function(){
 
  window.location.href = 'index.php?year='+$(this).val();
 })
 var innerHiddenValue = $($('input[name="f01"]').val()).val();

</script>


</html>

<?php 
unset($_SESSION['post_data']);

?>