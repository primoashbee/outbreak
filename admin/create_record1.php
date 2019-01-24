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
	$_SESSION['errors'] = $errors;
	header('location:create_record.php');
	return;
}

$firstname = addslashes($_POST['firstname']);
$middlename = addslashes($_POST['middlename']);
$lastname = addslashes($_POST['lastname']);
$gender = addslashes($_POST['gender']);
$barangay_id = $_POST['barangay'];
$disease_id = $_POST['disease_id'];
$date_of_sickness = addslashes($_POST['date_of_sickness']);



$sql ="
SELECT * FROM records where firstname='$firstname' and middlename='$middlename' and lastname='$lastname' and gender = '$gender' and barangay_id ='$barangay_id' and date_of_sickness ='$date_of_sickness' and disease_id='$disease_id'";

if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
	$_SESSION['msg'] = array('isSuccess'=>0,'message'=>'Record already exists in our system');
	$_SESSION['post_data'] = $_POST;
	header('location:create_record.php');
	return;
}

$user_id = $_SESSION['user']['id'];
$case_id = generateCaseNumber();


$sql = "INSERT INTO records (case_id,disease_id,firstname,middlename,lastname,gender,barangay_id,date_of_sickness,created_by) values
('$case_id','$disease_id','$firstname','$middlename','$lastname','$gender','$barangay_id','$date_of_sickness','$user_id')";



if(mysqli_query($conn,$sql)){
	$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Record added');

	header('location:create_record.php');
	return;
}else{
	$_SESSION['msg'] = array('isSuccess'=>0,'message'=>'Something went wrong.');
	header('location:create_record.php');
	return;
}



?>