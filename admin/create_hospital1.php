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
$address = addslashes($_POST['address']);

if(!checkIfHospitalExists($name)){
	$sql ="Insert into hospitals(`name`,address) values 
	('$name','$address');";
	if(mysqli_query($conn,$sql)){
		$id = mysqli_insert_id($conn);
	  	$sql ="Select * from hospitals where id ='$id'";
	    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $pusher->trigger('my-channel', 'hospital.create', $data);

		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Hospital Succesfully Created!');
		header('location:create_hospital.php');
	}else{
		echo 'di nag save';
	}
}else{
	$_SESSION['msg'] =array('isSuccess'=>0,'message'=>'Hospital Already Exists');
	header('location:create_hospital.php');
}



?>