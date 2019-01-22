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
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Firstname</th>
                                                    <th scope="col">Lastname</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            <?php 
                                              $users = getUsers();

                                              foreach($users as $user){
                                               
                                          
                                            ?>
                                                <tr>
                                                    <th scope="row"><?=$user['username']?></th>
                                                    <td><?=ucfirst($user['firstname'])?></td>
                                                    <td><?=ucfirst($user['lastname'])?></td> 
                                                    <td>
                                                        <button type=" button" id="<?=$user['id']?>" class="updateAccount btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                        <button type="button" id="<?=$user['id']?>" username="<?=$user['username']?>" class="deleteAccount btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>

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
    include "../includes/scripts.php"
?>
<script>
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

        $("#btnUpdate").click(function(){
            id = $('#username_id').val()
            firstname = $('#firstname').val()
            lastname = $('#lastname').val()
            var p1 =$('#password').val();
            var p2 = $('#password_confirmation').val();
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

        $(".deleteAccount").click(function(){
            $('#d_id').val($(this).attr('id'))
            $('#usernameDel').html($(this).attr('username'))
            $('#alertModal').modal('show')
        })
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
</script>
</html>