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

$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);

if(!checkIfHospitalExists($name)){
	$sql ="Insert into hospitals(`name`,address) values 
	('$name','$address');";
	if(mysqli_query($conn,$sql)){
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