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
                            
                                 <div class="btn-group btn-group-toggle" data-toggle="buttons" style="float:right">
                                  <label class="btn btn-secondary warning" id="btnPrint" >
                                    <input type="radio"  autocomplete="off" value="all" > Morbidity Week
                                  </label>
                                  <label class="btn btn-warning" id="btnPrint2">
                                    <input type="radio"  autocomplete="off" value="pending"> Line List
                                  </label>
                                </div>

                                <h4 class="header-title">Record List</h4>
                                <form action="records.php" method="GET" id="request">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-secondary warning">
                                    <input type="radio" class="radio" name="request" id="option1" autocomplete="off" value="all" > All
                                  </label>
                                  <label class="btn btn-warning">
                                    <input type="radio" class="radio" name="request" id="option2" autocomplete="off" value="pending"> Pending
                                  </label>
                                  <label class="btn btn-success">
                                    <input type="radio" class="radio" name="request" id="option3" autocomplete="off" value="healthy"> Healthy
                                  </label>
                                  <label class="btn btn-danger">
                                    <input type="radio" class="radio" name="request" id="option4" autocomplete="off" value="deceased"> Deceased
                                  </label>
                                  </form>

                                </div>
                               <form action="<?=basename($_SERVER['REQUEST_URI'])?>" method="GET" id="frmSearch">
                               <div class="row" style="padding-top:20px">
                                <?php 
                                    $request = "all";
                                    if(isset($_GET['request'])){
                                        $request = $_GET['request'];
                                    }
                                ?>
                                   <input type="hidden" name="request" value="<?=$request?>" class="filter">
                                   <div class="col-4">
                                        <select  name="search_year" id="search_year" class="form-control filter">
                                            <option value="">Year</option>
                                              <?php 
                                                $years = getYearsInRecords();

                                                foreach ($years as $year) {
                                                
                                              ?>
                                          <option value="<?=$year['year']?>"><?=$year['year']?></option>

                                              <?php 
                                              }

                                              ?>
                                        </select>
                                       
                                   </div>
                                   <div class="col-3">
                                       <select  id="from" name="from" class="form-control filter" >
                                            <option value="">From Date</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                   </div>
                                   <div class="col-3">
                                    
                                       <select  id="to" name="to" class="form-control filter" >
                                            <option value="">To Date</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        
                                   </div>
                                   <div class="col-2">
                                    
                                    <button type="submit" class="btn btn-success" class="form-control" id="btnSearch" >Search</button>
                                    </form>
                                </div>
                               </div>
                                <div class="single-table" style="margin-top: 25px">
                                <div id="app">
                                    <div class="table table-responsive">
                                        <table class="table text-center" id="tblRecords">

                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">CASE #</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scope="col">NAME</th>
                                                    <th scope="col">GENDER</th>
                                                    <th scope="col">AGE</th>
                                                    <th scope="col">HOSPITAL</th>
                                                    <th scope="col">BARANGAY</th>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">DATE</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            <?php 
                                            $request = "all";
                                            
                                            $from = "";
                                            $to = "";
                                            $search_year = date('Y');

                                            if(isset($_GET['request'])){ 
                                                $request = $_GET['request'];                                                
                                            }
                                            if(isset($_GET['from'])){ 
                                                $from = $_GET['from'];
                                                                                                
                                            }
                                            if(isset($_GET['to'])){ 
                                                $to = $_GET['to'];
                                                
                                                                                               
                                            }
                                            if(isset($_GET['search_year'])){ 
                                                $search_year = $_GET['search_year'];
                                                                                               
                                            }

                                            ?>
                                                <tr class="active" v-for="record in records">
                                                    <td>{{record.case_id}}</td>
                                                    <td>
                                                        <div v-if="record.status==='pending'">
                                                            <span class="status-p bg-warning" >Pending</span>
                                                        </div>
                                                        <div v-else-if="record.status==='deceased'">
                                                            <span class="status-p bg-danger" >Deceased</span>
                                                        </div>
                                                        <div v-else-if="record.status==='healthy'">
                                                            <span class="status-p bg-success" >Healthy</span>
                                                        </div>
                                                    </td>
                                                    <td>{{record.full_name}}</td>
                                                    <td>{{record.gender}}</td>
                                                    <td>{{record.age}}</td>
                                                    <td>{{record.hospital_name}}</td>
                                                    <td>{{record.barangay_name}}</td>
                                                    <td>{{record.disease_name}}</td>
                                                    <td>{{record.date_of_sickness}}</td>
                                                    <td>

                                                    <!-- 
                                                        <button type=" button" v-bind:id="record.id" v-bind:case_id = "record.case_id" class="updateRecord btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                    !-->
                                                        <button v-if="record.status==='pending'" type="button" 
                                                        v-bind:id="record.id" 
                                                        v-bind:case_id = "record.case_id" 
                                                        v-bind:date_of_sickness = "record.date_of_sickness"
                                                        class ="onsetRecord btn btn-rounded btn-success mb-3"><i class="ti-check"></i></button>

 

                                                    </td>
                                                </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
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

    <div class="modal fade bd-example-modal-lg" id="updateModal">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><center><b><span id="update_case_id"></span></b></center></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="row">

                        <div class="form-group col">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control required" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Firstname" required="" value="" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                        </div>
                        <div class="form-group col">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control required" id="middlename" aria-describedby="middlename" placeholder="Middlename" name="middlename" required="" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                        </div>
                        <div class="form-group col">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control required" id="lastname" aria-describedby="lastname" placeholder="Lastname" name="lastname" required=""  value="" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col">
                            <label for="birthday">Birthday</label>
                            <input type="date" class ="form-control required" id = "birthday" name="birthday" value="" required >
                        </div>
                        <div class="form-group col">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control required" required="">
                                <option value="">Please Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="baranggay">Barangay</label>
                            <select name="barangay" id="barangay" class="form-control required"  required="">
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
                        <div class="form-group col">
                            <label for="disease_id">Disease</label>
                            <select name="disease_id" id="disease_id" class="form-control required"  required="">
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
                        <div class="form-group col">
                            <label for="date_of_sickness">Date</label>
                            <input type="date" class="form-control required" id="date_of_sickness" aria-describedby="date_of_sickness" placeholder="date_of_sickness" name="date_of_sickness" required=""  value="<?=old('date_of_sickness')?>">
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
               <h3> Are you sure you want to delete this record: <b><i><span id="case_id_delete"></span></i></b> ? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnDelete" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="forPrintModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Print Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                

                    <select  id="printYear" class="form-control">
                          <?php 
                            $years = getYearsInRecords();

                            foreach ($years as $year) {
                            
                          ?>
                      <option value="<?=$year['year']?>"><?=$year['year']?></option>

                          <?php 
                          }

                          ?>
                    </select>
                    <select id ="printDiseaseID" class="form-control">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnPrintNow" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="forPrint2Modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Print Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                

                    <select  id="printYear2" class="form-control">
                          <?php 
                            $years = getYearsInRecords();

                            foreach ($years as $year) {
                            
                          ?>
                      <option value="<?=$year['year']?>"><?=$year['year']?></option>

                          <?php 
                          }

                          ?>
                    </select>
                    
                    <select  id="printFrom" class="form-control">
                        <option value="">From Date</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    
                    <select  id="printTo" class="form-control">
                        <option value="">To Date</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnPrintNow2" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm " id="onsetModal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Release Information</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="date_of_sickness_onset">
                    <input type="hidden" id="record_id">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Please select</option>
                            <option value="deceased">Deceased</option>
                            <option value="healthy">Healthy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_of_release">Date of Release</label>
                        <input type="date" name="date_of_release" id="date_of_release" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnRelease" class="btn btn-primary">Save changes</button>
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
    var request ="<?=$request?>"
    var search_year ="<?=$search_year?>"
    var from ="<?=$from?>"
    var to ="<?=$to?>"
    
    var app = new Vue({
      el:"#app",
      data: {
        records: 
          <?=json_encode(getPatientRecords(false,$request,$search_year,$from,$to))?>        
      },

      methods: {
        addRecord(data){
            this.records.push(data)
            this.refreshTable()
        },
        refreshTable(){
            var vm = this

            $.ajax({
                url:'ajax.php',
                data:{type:'get_records', request:request, search_year:search_year, from:from, to:to},
                dataType:'JSON',
                type:'POST',
                success:function(data){
                    $('#tblRecords').DataTable().destroy();
                    vm.records = data
                    vm.refreshDataTable()
                }
            })

        },
        refreshDataTable(){
            this.$nextTick(function() {
            $('#tblRecords').DataTable({
                'destroy'     : true,
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'order'       : [[ 8, 'desc' ]],
                'info'        : true,
                'autoWidth'   : false,
                'dom'         : 'Blfrtip'
            });
            });
        }


      },
      mounted(){
        $('#tblRecords').DataTable({
            "order" :  [[8, "desc"]]
        });

        $('#from').val('<?=$from?>')
        $('#to').val('<?=$to?>')
        $('#search_year').val('<?=$search_year?>')
        
      }
    });

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');

    channel.bind('record.create', function(data) {
      //$("#data").html(data.text);
      $('#tblRecords').DataTable().destroy()
      app.addRecord(data);
      $.notify("Record created [Record: "+data.case_id+"]",
        {
             // whether to hide the notification on click
              clickToHide: true,
              // whether to auto-hide the notification
              autoHide: false,
              // if autoHide, hide after milliseconds
              autoHideDelay: 5000,
              // show the arrow pointing at the element
              arrowShow: true,
              // arrow size in pixels
              arrowSize: 5,
              // position defines the notification position though uses the defaults below
              position: '...',
              // default positions
              elementPosition: 'top right',
              globalPosition: 'top right',
              // default style
              style: 'bootstrap',
              // default class (string or [string])
              className: 'success',
              // show animation
              showAnimation: 'slideDown',
              // show animation duration
              showDuration: 400,
              // hide animation
              hideAnimation: 'slideUp',
              // hide animation duration
              hideDuration: 200,
              // padding between element and notification
              gap: 2
        })

     
    });

    $('input[type=radio].radio').on('change',function(){
        $("#request").submit();
    });
    $('.updateRecord').click(function(){
        var id = $(this).attr('id')
        $("#update_case_id").html($(this).attr('case_id'));
        $.ajax({
            url:'ajax.php',
            data:{
                    id:id,
                    type:'get_record_via_id'
            },
            dataType:'JSON',
            type: 'POST',
            success:function(data){
                $("#id").val(id)
                $("#firstname").val(data.firstname)
                $("#middlename").val(data.middlename)
                $("#lastname").val(data.lastname)
                $("#birthday").val(data.birthday)
                $("#gender").val(data.gender)
                $("#barangay").val(data.barangay_id)
                $("#disease_id").val(data.disease_id)
                $("#date_of_sickness").val(data.date_of_sickness)
                $('#updateModal').modal('show');
                console.log("disease_id is "+data.disease_id)
            }
        })

    });

    $('.onsetRecord').click(function(){
        $('#record_id').val($(this).attr('id'))
        $('#date_of_sickness_onset').val($(this).attr('date_of_sickness'))
        $('#onsetModal').modal('show');
    })

    $('#btnRelease').click(function(){
        var id = $('#record_id').val()
        var date_of_sickness = new Date($('#date_of_sickness_onset').val())
        var date_of_release = new Date($("#date_of_release").val())
        var status = $('#status').val()

        if(isFutureDate(date_of_release)){
            alert('Date should not be in the future')
            return;
        }


        if($("#date_of_sickness_onset").val() == "" || $("#date_of_release").val() =="" || status ==""){
            alert('Fill up release form')
            return;
        }

        if(date_of_release < date_of_sickness){
            alert('Invalid. Release date should be on or after admission date ('+date_of_sickness.toLocaleDateString('en-US', {   
                                        day: 'numeric',
                                        month: 'long', 
                                        year: 'numeric'
                                    })+')')
            return;
        }

        $.ajax({
            url:'ajax.php',
            dataType: 'JSON',
            type: 'POST',
            data: {type:'release_record_via_id',id:id,date_of_sickness:$('#date_of_sickness_onset').val(),date_of_release:$("#date_of_release").val(),status:status},
            success: function(data){
                    if(data.isSuccess){
                        alert(data.message)
                        location.reload()
                    }
            }
        })

    })
    channel.bind('record.released', function(data) {
        app.refreshTable()
    })
    $('.deleteRecord').click(function(){
        $('#d_id').val($(this).attr('id'))
        $('#case_id_delete').html($(this).attr('case_id'))
        $('#alertModal').modal('show');
    });

    $("#btnUpdate").click(function(){
        var ctr = 0
        $.each($('.required'),function(k,v){
            if($(v).val()==""){
                ctr++
            }
        })  

        if(ctr>0){
            console.log(ctr)
            alert('Please fill up all')
            return;
        }

        $.ajax({
            url: 'ajax.php',
            data : {
                type: 'update_record_via_id',
                id: $('#id').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                birthday: $('#birthday').val(),
                gender: $('#gender').val(),
                barangay: $('#barangay').val(),
                disease_id: $('#disease_id').val(),
                date_of_sickness: $('#date_of_sickness').val()
            },
            dataType: 'JSON',
            type: 'POST',
            success: function(data){
                if(data.isSuccess){
                    alert("Record Successfully Updated!");
                    location.reload()
                }
            }

        })
    })

    $("#btnDelete").click(function(){
        var id = $('#d_id').val()
        $.ajax({
            url:'ajax.php',
            data: {type:'delete_record_via_id',id:id},
            dataType:'JSON',
            type:'POST',
            success:function(data){
                if(data.isSuccess){
                    alert('Record Successfully Deleted');
                    location.reload()
                }
            }
        })
    })

    $('#btnPrint').click(function(){
        $('#forPrintModal').modal('show')
    })
    $('#btnPrint2').click(function(){
        $('#forPrint2Modal').modal('show')
    })

    $('#btnPrintNow').click(function(){
        var year = $('#printYear').val()
        var disease_id = $('#printDiseaseID').val()
        if(year =="" || disease_id==""){
            alert("Select year and disease")
            return;
        }

        location.href="report.php?year="+year+"&disease_id="+disease_id
    })
    $('#btnPrintNow2').click(function(){
        var year = $('#printYear2').val()
        var from = $('#printFrom').val()
        var to = $('#printTo').val()
        if(year =="" || from=="" || to == ""){
            alert("Select year and month range")
            return;
        }
       
       location.href="report2.php?year="+year+"&from="+from+"&to="+to
    })

    $('#frmSearch').submit(function(){
        $.each($('.filter'),function(k,v){

            if($(v).val()==""){
                $(v).attr('disabled',true)
            }

        });
    })


</script>
</html>