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


                                            <?php 
                                              $hospitals = getHospitals();

                                              foreach($hospitals as $hospital){
                                               
                                          
                                            ?>
                                                <tr>
                                                    <th scope="row">
                                                        
                                                        <?php if($hospital['isDeleted']){
                                                        ?>      
                                                        <span class="status-p bg-danger">Closed</span> 
                                                        <?php }else{ ?>
                                                        <span class="status-p bg-success">Active</span>
                                                        <?php }?>
                                                    </th>
                                                    <th scope="row"><?=$hospital['name']?></th>
                                                    <td><?=substr(ucfirst($hospital['address']),0,45).".."  
                                                    ?></td>
                                                    <td>



                                                        <?php if($hospital['isDeleted']){
                                                        ?>
                                                        <button type=" button" id="<?=$hospital['id']?>" class="updateDisease btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>      
                                                        <?php }else{ ?>
                                                        <button type=" button" id="<?=$hospital['id']?>" class="updateDisease btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                        <button type="button" id="<?=$hospital['id']?>" class="deleteDisease btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>
                                                        <?php }?>





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
    $('.deleteDisease').click(function(){
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
    $('.updateDisease').click(function(){
        id = "";
        id = $(this).attr('id')
        $.ajax({
            url:'ajax.php',
            data:{type:'get_hospital',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#diseaseName').html(data.info.name)
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