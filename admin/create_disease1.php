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

$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);

if(!checkIfDiseaseExists($name)){
	$sql ="Insert into diseases(`name`,description) values 
	('$name','$description');";
	if(mysqli_query($conn,$sql)){
		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Disease Succesfully Created!');
		header('location:create_disease.php');
	}else{
		echo 'di nag save';
	}
}else{
	$_SESSION['msg'] =array('isSuccess'=>0,'message'=>'Disease Already Exists');
	header('location:create_disease.php');
}



?>