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


$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$message = addslashes($_POST['message']);


if(!checkIfDiseaseExists($name)){
	$sql ="Insert into diseases(`name`,description,message) values 
	('$name','$description','$message');";
	if(mysqli_query($conn,$sql)){
		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Disease Succesfully Created!');
		$id = mysqli_insert_id($conn);
	  	$sql ="Select * from diseases where id ='$id'";
	    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $pusher->trigger('my-channel', 'disease.create', $data);
		header('location:create_disease.php');
	}else{
		echo 'di nag save';
	}
}else{
	$_SESSION['msg'] =array('isSuccess'=>0,'message'=>'Disease Already Exists');
	header('location:create_disease.php');
}



?>