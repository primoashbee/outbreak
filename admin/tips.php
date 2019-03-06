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
                            <h4 class="page-title pull-left">Health Knowledge</h4>
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
                                <h4 class="header-title">Health Knowledge / Tips</h4>
                                <div class="single-table">
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
                                    <div class="table-responsive">
                                        <table class="table text-center">

                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Subtitle</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Published By</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            <?php 
                                              $tips = getTips(false);

                                              foreach($tips as $k => $v){
                                               
                                          
                                            ?>
                                                <tr>
                                                    <th scope="row"><?=$v['title']?></th>
                                                    <td><?=(ucfirst($v['subtitle'])) ?></td>
                                                    <td><img src="../public/<?=$v['img_src']?>" style="max-width: 100px;max-height: 100px" /></td>
                                                    <td><?=getNameByID($v['created_by'])?></td>
                                                    <td>
                                                        <button type=" button" 
                                                            id="<?=$v['id']?>" 
                                                            title="<?=$v['title']?>"
                                                            subtitle="<?=$v['subtitle']?>"
                                                            img_src="../public/<?=$v['img_src']?>"
                                                            body="<?=$v['body']?>"
                                                           
                                                             class="updateTip btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>
                                                       <!-- <button type="button" 
                                                        id="<?=$v['id']?>" 
                                                        title="<?=$v['title']?>" 
                                                        class="deleteTip btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button> -->

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
<form action="update_tip1.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="diseaseName"></span></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="title" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" aria-describedby="subtitle" placeholder="subtitle" required="">
                    </div>
                    <div class="form-group">
                        <img src="" alt="" id="img_src1" class="img">
                    </div>
                    <div class="form-group">
                        <label for="img_src">Photo</label>
                        <input type="file" class="form-control" name="img_src" id="img_src" aria-describedby="img_src" placeholder="subtitle" accept="image/*">
                    </div>
                  
                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea class="form-control" id="body" aria-describedby="body" placeholder="body" name="body" required=""></textarea>
                    </div>
                   
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id ="btnUpdate" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</form>
    <div class="modal fade" id="alertModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="d_id">
               <h3> Are you sure you want to delete this Tip (<i><span id="diseaseNameDel"></span></i> )? </h3>
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
    $('.deleteTip').click(function(){
        $('#d_id').val()
        id = $(this).attr('id')
        title = $(this).attr('title')
        $.ajax({
            url:'ajax.php',
            data:{type:'get_hospital',id:id},
            dataType:'JSON',
            type:'POST',
            success: function(data){
                $('#d_id').val(id)
                $('#diseaseNameDel').html(title)
                $('#alertModal').modal('show');
            }
        })
        
    });    
    $('.updateTip').click(function(){
        id = "";
        id = $(this).attr('id')
        title = $(this).attr('title')
        subtitle = $(this).attr('subtitle')
        body = $(this).attr('body')
        img_src = $(this).attr('img_src')
      
        $('#id').val(id)
        $('#diseaseName').html(title)
        $("#title").val(title)
        $("#subtitle").val(subtitle)
        $("#body").val(body)
        $("#img_src1").attr('src',img_src)
        $('#updateModal').modal('show')
        
    });

    $('#btnDelete').click(function(){
        id = $("#d_id").val();
       
        $.ajax({
            url: 'ajax.php',
            data: {id:id,type:'delete_tip_via_id'},
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

<?php 
    unset($_SESSION['msg']);
?>