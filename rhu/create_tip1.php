<?php
require "../config.php";
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    if($_SESSION['user']['isAdmin']==0){
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


require_once('../vendor/autoload.php');

  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '21ce5477f6d4ba94c932',
    '8c2262865eca4ce3a395',
    '746357',
    $options
  );



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
      	  $filename =  str_replace(":", "-", strtolower($filename));
      	  $filename =  str_replace("'", "-", strtolower($filename));
      	  $filename =  str_replace("/", "-", strtolower($filename));
      	  $filename =  str_replace("\\", "-", strtolower($filename));
      	  $filename =  str_replace(".", "-", strtolower($filename));
      	  $filename =  str_replace(",", "-", strtolower($filename));
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
		move_uploaded_file($file_tmp,"../site/".$img_src);
		
		$id = mysqli_insert_id($conn);
	  	$sql ="SELECT 
				  t.*,
				  CONCAT('../site/', t.img_src) AS user_src,
				  CONCAT(u.`firstname`,'$space',u.`lastname`) AS created_by
				FROM
				  tips t
				  LEFT JOIN users u
				    ON t.created_by = u.id 
				WHERE t.isHidden = false and t.id = '$id'
				ORDER BY created_at DESC";
	    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $pusher->trigger('my-channel', 'tip.create', $data);

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