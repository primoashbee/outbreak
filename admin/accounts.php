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
<body >

 
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
                <div id="app">
                    <div class="col-lg-12 mt-5">
                    <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Suspended</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                             <h4 class="header-title">List of Accounts</h4>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">

                                                            <thead class="text-uppercase bg-dark">
                                                                <tr class="text-white">
                                                                    <th scope="col">Username</th>
                                                                    <th scope="col">Firstname</th>
                                                                    <th scope="col">Lastname</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <tr v-for="user in users">
                                                                    <th scope="row">{{user.username}}</th>
                                                                    <th scope="row">{{user.firstname}}</th>
                                                                    <th scope="row">{{user.lastname}}</th>
                                                                    <td scope="row">

                                                                        <span class="status-p bg-success" v-if="user.isLoggedIn==true">Acitve</span>

                                                                        <span class="status-p bg-danger" v-else>Inactive</span>

                                                                    </td> 
                                                                    <td>
                                                                        <button type=" button" @click="toUpdate(user.id,$event)" v-bind:id="user.id" class="updateAccount btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                                        

                                                                        <button type="button" @click="toDelete(user.id,$event)" v-bind:id="user.id" v-bind:username="user.username" class="deleteAccount btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>

                                                                    

                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
                                                <h4 class="header-title">List of Accounts</h4>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">

                                                            <thead class="text-uppercase bg-dark">
                                                                <tr class="text-white">
                                                                    <th scope="col">Username</th>
                                                                    <th scope="col">Firstname</th>
                                                                    <th scope="col">Lastname</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <tr v-for="user in usersDeleted">
                                                                    <th scope="row">{{user.username}}</th>
                                                                    <th scope="row">{{user.firstname}}</th>
                                                                    <th scope="row">{{user.lastname}}</th>
                                                                    <td scope="row">

                                                                        <span class="status-p bg-danger">Suspended</span>

                                                                    </td>                                                                     

                                                                    <td>

                                                                        <button @click="toRecover(user.id,$event)" type="button" v-bind:id="user.id" v-bind:username="user.username" class="recoverAccount btn btn-rounded btn-success mb-3"><i class="ti-back-left"></i></button>



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
                        <input type="password" name="password" class="form-control" id="password1" placeholder="Password"  required="">
                    </div>
                    <div class="form-group col">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" id="password_confirmation1" placeholder="Password Confirmation" name="password" required="">
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
               <h3> Are you sure you want to SUSPEND this Account <b><i><span id="usernameDel"></span></i></b>? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnDelete" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="recoverModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="r_id">
               <h3> Are you sure you want to RECOVER this Account <b><i><span id="usernameRec"></span></i></b>? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnRecover" class="btn btn-danger">Confirm</button>
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
        
    var app = new Vue({
      el:"#app",
      data: {
        users: <?=json_encode(getUsers(false))?>,
        usersDeleted : <?=json_encode(getUsersDeleted())?>
        
      },
      methods :{
        addUsers(data){
          this.users.push(data)
          //console.log(data)
        },
        refreshUsers(){
            this.users=""
            var users = []
            $.ajax({
                url:'ajax.php',
                data:{type:'get_users'},
                dataType:'JSON',
                type:'POST',
                success: function(data){
                    $.each(data,function(k,v){
                        users.push(v)
                        
                    })
            }
            })
            this.users = users
            //alert(users)


          //console.log(data)
        },
        toUpdate(id){
            $.ajax({
            url:'ajax.php',
            data:{type:'get_account_by_id',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#username_id').val(id)
                $('#username').val(data.info.username)
                $('#firstname').val(data.info.firstname)
                $('#lastname').val(data.info.lastname)
                $('#updateModal').modal('show')
            }
            })
        },
        toDelete(id,event){
            $('#d_id').val(id)

            $('#usernameDel').html($(event.target).attr('username'))
            $('#alertModal').modal('show')
        },
        toRecover(id,event){
            $('#r_id').val(id)
            $('#usernameRec').html('')
            $('#usernameRec').html($(event.target).attr('username'))
            $('#recoverModal').modal('show')  
        }
      },

    });

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');

    channel.bind('account.login', function(data) {
        //alert('May NAg login')
        $.notify("User Logged In ["+data+"]",
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
        app.refreshUsers()
    })
    channel.bind('account.logout', function(data) {
        //alert('May nag logout')
        $.notify("User Logged Out ["+data+"]",
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
        app.refreshUsers()
    })

    channel.bind('account.create', function(data) {
          $("#data").html(data.text);
          app.addUsers(data);
          console.log(data)
          $.notify("Account created [username: "+data.username+"]",
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

    /*
    $('.updateAccount').click(function(){
            id = $(this).attr('id')
            $.ajax({
                url:'ajax.php',
                data:{type:'get_account_by_id',id:id},
                dataType:'JSON',
                type:'POST',
                success: function(data){
                    $('#username_id').val(id)
                    $('#username').val(data.info.username)
                    $('#firstname').val(data.info.firstname)
                    $('#lastname').val(data.info.lastname)
                    $('#updateModal').modal('show')
                }
            })
        });
    */
        $("#btnUpdate").click(function(){
            id = $('#username_id').val()
            firstname = $('#firstname').val()
            lastname = $('#lastname').val()
            var p1 = $('#password1').val();
            var p2 = $('#password_confirmation1').val();
            if(ifHasPassword(p1,p2)){
                if(passwordConfirmed(p1,p2)){
                    $.ajax({
                        url:'ajax.php',
                        data:{
                            type:'update_user_via_id',
                            id:id,
                            firstname:firstname,
                            lastname:lastname,
                            password:p1},
                        dataType: 'JSON',
                        type:'POST',
                        success:function(data){
                            if(data.isSuccess){
                                alert(data.message)
                                location.reload()
                            }

                        }

                    })
                    return;
                }
                 alert('Password Must Match')
                 return;
            }else{
                    $.ajax({
                        url:'ajax.php',
                        data:{
                            type:'update_user_via_id',
                            id:id,
                            firstname:firstname,
                            lastname:lastname,
                        },
                        dataType: 'JSON',
                        type:'POST',
                        success:function(data){
                            if(data.isSuccess){
                                alert(data.message)
                                location.reload()
                            }

                        }

                    })

                
            }
            
        })
 /*
        $(".deleteAccount").click(function(){
            $('#d_id').val($(this).attr('id'))
            $('#usernameDel').html($(this).attr('username'))
            $('#alertModal').modal('show')
        })
*/
/*
        $(".recoverAccount").click(function(){
            $('#r_id').val($(this).attr('id'))
            $('#usernameRec').html($(e).attr('username'))
            $('#recoverModal').modal('show')
        });
*/
        $("#btnDelete").click(function(){
            var id = $('#d_id').val();
            $.ajax({
                url:'ajax.php',
                data:{type:'delete_user_via_id',id:id},
                type:'POST',
                dataType:'JSON',
                success:function(data){
                    if(data.isSuccess){
                        alert(data.message)
                        location.reload()
                    }
                }
            })
        })
        $("#btnRecover").click(function(){
            var id = $('#r_id').val();
            $.ajax({
                url:'ajax.php',
                data:{type:'recover_user_via_id',id:id},
                type:'POST',
                dataType:'JSON',
                success:function(data){
                    if(data.isSuccess){
                        alert(data.message)
                        location.reload()
                    }
                }
            })
        })
</script>
</html>