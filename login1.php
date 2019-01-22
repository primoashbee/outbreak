<?php 
require 'config.php';
session_start();
if($_POST['username'] == "" || $_POST['password']==""){
	return 'complete info';
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
		exit;
	}
	echo 'wrong pass nigga';
	exit;
}

echo 'wrong pass nigga';
exit;
?>