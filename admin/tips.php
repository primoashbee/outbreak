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
            <div id="app">
            <div class="main-content-inner">

                <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Showed</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Hidden</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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


                                                    <tr v-for="tip in tips_shown">
                                                        <th scope="row">{{tip.title}}</th>
                                                        <td>{{tip.subtitle}} </td>
                                                        <td><img v-bind:src="tip.user_src" style="max-width: 100px;max-height: 100px" /></td>
                                                        <td>{{tip.created_by}}</td>
                                                        <td>
                                                            <!--<button type=" button" 
                                                                :id="tip.id" 
                                                                :title="tip.title"
                                                                :subtitle="tip.subtitle"
                                                                :img_src="tip.user_src"
                                                                :body="tip.body"
                                                               
                                                            @click="toUpdate(tip.id,$event)"
                                                            class=" btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>!-->
                                                           
                                                           <button type="button" 
                                                            :id="tip.id" 
                                                            :title="tip.title"

                                                            @click="toHide(tip.id,$event)"
                                                            class="btn btn-rounded btn-primary mb-3"><i class="fa fa-eye-slash"></i></button>                                                       
                                                            <!--
                                                            <button type="button" 
                                                            :id="tip.id" 
                                                            :title="tip.title"      
                                                            @click="toDelete(tip.id,$event)"                     
                                                            class=" btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>!-->

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

                                                        <tr>
                                                    <tr v-for="tip in tips_hidden">
                                                        <th scope="row">{{tip.title}}</th>
                                                        <td>{{tip.subtitle}} </td>
                                                        <td><img v-bind:src="tip.user_src" style="max-width: 100px;max-height: 100px" /></td>
                                                        <td>{{tip.created_by}}</td>
                                                        <td>

                                                            <!--
                                                            <button type=" button" 
                                                                :id="tip.id" 
                                                                :title="tip.title"
                                                                :subtitle="tip.subtitle"
                                                                :img_src="tip.user_src"
                                                                :body="tip.body"
                                                               
                                                            @click="toUpdate(tip.id,$event)"
                                                            class=" btn btn-rounded btn-warning mb-3"><i class="fa fa-edit"></i></button>-->
                                                           
                                                           <button type="button" 
                                                            :id="tip.id" 
                                                            :title="tip.title"

                                                            @click="toShow(tip.id,$event)"
                                                            class="btn btn-rounded btn-success mb-3"><i class="fa fa-eye"></i></button>                                                       
                                                            <!--
                                                            <button type="button" 
                                                            :id="tip.id" 
                                                            :title="tip.title"      
                                                            @click="toDelete(tip.id,$event)"                     
                                                            class=" btn btn-rounded btn-danger mb-3"><i class="ti-trash"></i></button>!-->

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
    <div class="modal fade" id="hideModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="d_id_1">
               <h3> Are you sure you want to hide this Tip (<i><span id="diseaseNameDel_1"></span></i> )? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnHide" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>

</body>
    <div class="modal fade" id="showModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id ="d_id_2">
               <h3> Are you sure you want to show this Tip (<i><span id="diseaseNameDel_2"></span></i> )? </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnShowTip" class="btn btn-danger">Confirm</button>
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
        tips_shown : <?=json_encode(getTips(false))?>,     
        tips_hidden : <?=json_encode(getTips(true))?>
      },
      methods: {
        addTip(data){
            this.tips_shown.push(data)
           
        },
        toUpdate(id,event){
            id = $(event.target).attr('id')
            title = $(event.target).attr('title')
            subtitle = $(event.target).attr('subtitle')
            body = $(event.target).attr('body')
            img_src = $(event.target).attr('img_src')
          
            $('#id').val('')
            $('#diseaseName').html('')
            $("#title").val('')
            $("#subtitle").val('')
            $("#body").val('')
            $("#img_src1").attr('src','') 

            $('#id').val(id)
            $('#diseaseName').html(title)
            $("#title").val(title)
            $("#subtitle").val(subtitle)
            $("#body").val(body)
            $("#img_src1").attr('src',img_src)
            $('#updateModal').modal('show')

        },
        toDelete(id,event){
            id = $(event.target).attr('id')
            title = $(event.target).attr('title')

            $('#d_id').val(id)
            $('#d_id').val('')
            $('#diseaseNameDel').html(title)

            $('#alertModal').modal('show');

        },
        toHide(id,event){
            id = $(event.target).attr('id')
            title = $(event.target).attr('title')
            console.log(id)     
            console.log(title)      
            $('#d_id_1').val(id)
            $('#d_id_1').val('')
            $('#diseaseNameDel_1').html(title)
            $('#hideModal').modal('show');

        },
        toShow(id,event){
            id = $(event.target).attr('id')
            title = $(event.target).attr('title')  

            $('#d_id_2').val(id)
            $('#d_id_2').val('')
            $('#diseaseNameDel_2').html('')
            $('#diseaseNameDel_2').html(title)
            $('#showModal').modal('show');
        }

      }
      

    })

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');

    channel.bind('tip.create', function(data) {
      //$("#data").html(data.text);
        
      app.addTip(data);
      $.notify("Tip created [Tip: "+data.title+"]",
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
    $('.deleteTip').click(function(){
        $('#d_id').val()
        

    });
    $('.hideTip').click(function(){
        $('#d_id').val()
        

    });  
    $('.showTip').click(function(){
        $('#d_id').val()


    });    
    $('.updateTip').click(function(){
        id = "";
       
        
    });
    */
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
    $('#btnHide').click(function(){
        id = $("#d_id_1").val();
       
        $.ajax({
            url: 'ajax.php',
            data: {id:id,type:'hide_tip_via_id'},
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
    $('#btnShowTip').click(function(){
        id = $("#d_id_2").val();
       
        $.ajax({
            url: 'ajax.php',
            data: {id:id,type:'show_tip_via_id'},
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