<?php
require "../config.php";
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    validateLogIn($_SESSION['user']['id']);
$errors = array();
foreach($_POST as $k => $v){
	if($v==""){
		array_push($errors,$k." is empty");
	}
}
if(count($errors)>1){
	//go back and send errors
}

$title = addslashes($_POST['title']);
$subtitle = addslashes($_POST['subtitle']);
$body = addslashes($_POST['body']);
$file = $_FILES['img_src'];
$file_tmp = $_FILES['img_src']['tmp_name'];
$file_ext=strtolower(end(explode('.',$_FILES['img_src']['name'])));
$extensions= array("jpeg","jpg","png");
	
if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true){
      	  $filename =  str_replace(" ", "-", strtolower($title));
      	  $img_src  = "img/tips/".$filename.'.jpg';
          
         //echo "Success";
      }else{
         print_r($errors);
      }
$user_id = $_SESSION['user']['id'];
if(!checkIfTitleExists($title)){
	$sql ="Insert into tips
		(title,subtitle,body,img_src,created_by) values 
		('$title',
		'$subtitle',
		'$body',
		'$img_src',
		'$user_id');";
	if(mysqli_query($conn,$sql)){
		move_uploaded_file($file_tmp,"../public/".$img_src);
		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Tip Succesfully Created!');
		header('location:create_tip.php');
	}else{
		echo 'di nag save';
	}
}else{
	$_SESSION['msg'] =array('isSuccess'=>0,'message'=>'Tip Already Exists');
	header('location:create_tip.php');
}



?>