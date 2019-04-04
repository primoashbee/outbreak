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
                            <h4 class="page-title pull-left">Hospital</h4>
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
                <div id="app">
                <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">List of Hospitals</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">

                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                         
                                                <tr v-for="hospital in hospitals">
                                                    <th scope="row">
                                                    
                                                        <span class="status-p bg-danger" v-if="hospital.isDeleted==true">Closed</span> 
                                                        <span class="status-p bg-success" v-if="hospital.isDeleted==false">Active</span>
                                                    </th>
                                                    <th scope="row">{{hospital.name}}</th>
                                                    <td>{{hospital.address}}</td>
                                                    <td>



                                                    
                                                        <button type=" button" v-bind:id="hospital.id" class="updateHospital btn btn-rounded btn-warning mb-3" v-if="hospital.isDeleted==true"><i class="fa fa-edit"></i></button>      
                                                      
                                                        <button type=" button" v-bind:id="hospital.id" class="updateHospital btn btn-rounded btn-warning mb-3"
                                                        v-if="hospital.isDeleted==false"><i class="fa fa-edit"></i></button>
                                                        
                                                        <button type="button" v-bind:id="hospital.id" class="deleteHospital btn btn-rounded btn-danger mb-3"
                                                        v-if="hospital.isDeleted==false"><i class="ti-trash"></i></button>
                                                      





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

    <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="hospital_name"></span></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" id="hospital_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="name" required="">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">Description</label>
                            <textarea class="form-control" id="address" aria-describedby="description" placeholder="address" name="address" required=""></textarea>
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
               <h3> Are you sure you want to delete this Hospital (<i><span id="diseaseNameDel"></span></i> )? </h3>
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
    unset($_POST['msg']);
    unset($_SESSION['post_data']);
?>
<script>
    var id;



    var app = new Vue({
      el:"#app",
      data:{
        hospitals : <?=json_encode(getHospitals())?>     
      },
      methods: {
        addHospital(data){
            this.hospitals.push(data)
           
        },
        refreshTable(){
            $('#tblRecords').DataTable()
        }


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
      $.notify("Hospital created [Hospital: "+data.name+"]",
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

    $('.deleteHospital').click(function(){
        $('#d_id').val()
        id = $(this).attr('id')
        $.ajax({
            url:'ajax.php',
            data:{type:'get_hospital',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#d_id').val(id)
                $('#diseaseNameDel').html(data.info.name)
            }
        })
        $('#alertModal').modal('show');
    });    
    $('.updateHospital').click(function(){

        id = "";
        id = $(this).attr('id')

        $.ajax({
            url:'ajax.php',
            data:{type:'get_hospital',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#hospital_id').html(id)
                $('#name').val(data.info.name)
                $('#address').val(data.info.address)
                $('#updateModal').modal('show')
            }
        })
    });

    $('#btnUpdate').click(function(){
        var name = $('#name').val()
        var address = $('#address').val()

        if(name == "" || address ==""){
            alert('Please fill up all fields')
            return;
        }

        $.ajax({
            url:'ajax.php',
            data: {type:'update_hospital_via_id',id:id,name:name,address:address},
            type:'POST',
            dataType:'JSON',
            success: function(data){
                if(data.isSuccess){
                    alert('Updated')
                    location.reload()
                }else{
                    alert('Something went wrong');
                }
            }

        })
    })
    $('#btnDelete').click(function(){
        id = $("#d_id").val();
        $.ajax({
            url: 'ajax.php',
            data: {id:id,type:'delete_hospital_via_id'},
            dataType: 'JSON',
            type: 'POST',
            success: function(data){
                if(data.isSuccess){
                    alert(data.message)
                    location.reload()
                }
            }
        })
    });
</script>
</html>