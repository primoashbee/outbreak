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
                            <h4 class="page-title pull-left">Diseases</h4>
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
                                <h4 class="header-title">List of Diseases</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">

                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr v-for="disease in diseases">
                                                    <td scope="row">
                                                      
                                                        <span class="status-p bg-danger" v-if="disease.isDeleted == true">Deleted</span> 
                                                        <span class="status-p bg-success" v-if="disease.isDeleted == false">Active</span> 
                                                       
                                                        
                                                    </td>
                                                    <td>{{disease.name}}
                                                    <td>{{disease.description}}  
                                                    
                                                        
                                                    </td>
                                                    <td>
                                                        <button type=" button"  @click="toUpdate(disease.id)" v-bind:id="disease.id" class=" btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>

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
    </div>
    <?php 

    include "../includes/footer.php";

    ?>

    <!-- page container area end -->
    <!-- offset area start -->

    <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="diseaseName"></span></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
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
               <h3> Are you sure you want to delete this disease (<i><span id="diseaseNameDel"></span></i> )? </h3>
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
    /*
    $("#message").on("keyup",function(e){
        var char = 160;
        var total =  $(this).val().length
        $('#charLeft').html(char - total)


        var max = 160;
        if (e.which < 0x20) {
            // e.which < 0x20, then it's not a printable character
            // e.which === 0 - Not a character
            return;     // Do nothing
        }
        if (this.value.length == max) {
            e.preventDefault();
        } else if (this.value.length > max) {
            // Maximum exceeded
            this.value = this.value.substring(0, max);
        }
        $('#charLeft').html(char - total)
  
        
    })
    */


      var app = new Vue({
      el:"#app",
      data: {
        diseases: 
          <?=json_encode(getDiseases(false))?>
        
      },
      methods :{
        addDisease(data){
          this.diseases.push(data)
          //console.log(data)
        },
        toUpdate(id){
            $.ajax({
                url:'ajax.php',
                data:{type:'get_disease',id:id},
                dataType:'JSON',
                type:'POST',
                success: function(data){
                    textAreaAdjust($('#description'))
                    //textAreaAdjust($('#message'))
                    $('#diseaseName').html(data.info.name)
                    $('#name').val(data.info.name)
                    $('#description').val(data.info.description)
                    $('#message').val(data.info.message)
                            var char = 120;
                            var total =  $("#message").val().length
                            
                            $('#charLeft').html(char - total)
                    $('#updateModal').modal('show')
                }
            })

        }  
      }
    });

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');

    channel.bind('disease.create', function(data) {
      //$("#data").html(data.text);
      app.addDisease(data);
      console.log(data)
      $.notify("Diseases created [Disease: "+data.name+"]",
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

    $('.deleteDisease').click(function(){
        $('#d_id').val()
        id = $(this).attr('id')
        $.ajax({
            url:'ajax.php',
            data:{type:'get_disease',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#d_id').val(id)
                $('#diseaseNameDel').html(data.info.name)
            }
        })
        $('#alertModal').modal('show');
    });    

    $('#btnUpdate').click(function(){
        var name = $('#name').val()
        var description = $('#description').val()
        var message = $('#message').val()

        if(name == "" || description =="" || message ==""){
            alert('Please fill up all fields')
            return;
        }

        $.ajax({
            url:'ajax.php',
            data: {type:'update_disease_via_id',id:id,name:name,description:description,message:message},
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
            data: {id:id,type:'delete_disease_via_id'},
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