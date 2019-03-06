<?php 

require "../config.php";
session_start();

if(!isset($_SESSION['user'])){
    header('location:../index.php');
}
if($_SESSION['user']['isAdmin']==0){
    header('location:../index.php');   
}

$xml=simplexml_load_file("setup.xml");
if(isset($_POST['sms'])){
	$xml->sms->activated = "true";
	$xml->asXML('setup.xml');
}else{
	$xml->sms->activated = "false";
	$xml->asXML('setup.xml');
	
}

foreach ($_POST['brgy'] as $k => $v) {
	$sql = "UPDATE barangays set contact = '$v' where id ='$k'";
	
	mysqli_query($conn,$sql);
}

	$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Parameters updated');
//	$_SESSION['post_data'] = $_POST;
	

	header('location:setup.php');
	return;
?>