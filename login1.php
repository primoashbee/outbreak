<?php 
require 'config.php';
session_start();
if($_POST['username'] == "" || $_POST['password']==""){

	
}
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$sql ="Select * from  users where username ='$username'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	$info = mysqli_fetch_assoc($res);
	if(password_verify($password,$info['password'])){
		echo 'nice pass';
		$_SESSION['user'] = $info;
		header('location:admin/index.php');
		exit;
	}
	$_SESSION['msg'] = array('isSucces'=>0,'msg'=>'User not found!');
	$_SESSION['post_data'] = $_POST;
	header('location:index.php');
	exit;
}

$_SESSION['msg'] = array('isSucces'=>0,'msg'=>'User not found!');
$_SESSION['post_data'] = $_POST;
header('location:index.php');
exit;
?>