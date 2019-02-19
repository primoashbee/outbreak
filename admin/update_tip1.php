<?php
require "../config.php";
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
$errors = array();
foreach($_POST as $k => $v){
	if($v==""){
		array_push($errors,$k." is empty");
	}
}
if(count($errors)>1){
	//go back and send errors
}

$id = $_POST['id'];
$title = addslashes($_POST['title']);
$subtitle = addslashes($_POST['subtitle']);
$body = addslashes($_POST['body']);

if(!$_FILES['img_src']['error'] == 4){


	$file = $_FILES['img_src'];
	$file_tmp = $_FILES['img_src']['tmp_name'];
	$file_ext=strtolower(end(explode('.',$_FILES['img_src']['name'])));
	$extensions= array("jpeg","jpg","png");



	if(in_array($file_ext,$extensions)=== false){
	         $errors[]="";
	         $_SESSION['msg'] = array('isSuccess'=>0,'message'=>'extension not allowed, please choose a JPEG or PNG file.');

	         header('location:tips.php');
	         return;
	      }
	      
	      if(empty($errors)==true){
	      	  $filename =  str_replace(" ", "-", strtolower($title));
	      	  $img_src  = "img/tips/".$filename.'.jpg';
	          
	         //echo "Success";
	      }else{
	         print_r($errors);
	      }

			$user_id = $_SESSION['user']['id'];

			$sql ="Update tips set subtitle ='$subtitle', body ='$body', img_src ='$img_src' where id = '$id'";		
			if(mysqli_query($conn,$sql)){
				move_uploaded_file($file_tmp,"../public/".$img_src);
				$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Tip Succesfully Created!');
				header('location:tips.php');
			}else{
				echo 'di nag save';
			}

	}

	$user_id = $_SESSION['user']['id'];

	$sql ="Update tips  set subtitle ='$subtitle', body ='$body' where id = '$id'";	
		
	if(mysqli_query($conn,$sql)){
	
		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Tip Succesfully Updated!');
		header('location:tips.php');
	}else{
		//echo 'di nag save';
	}

	



?>