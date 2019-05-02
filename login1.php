<?php 
require 'config.php';
session_start();
if($_POST['username'] == "" || $_POST['password']==""){

	
}
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$sql ="Select * from  users where username ='$username'";
//$sql ="Select * from  users where username ='$username' and forceLogout = false";

$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){


	$info = mysqli_fetch_assoc($res);

	if($info['forceLogout']==true){
		$_SESSION['msg'] = array('isSucces'=>0,'msg'=>'Users suspended! Contact System Administrator');
		$_SESSION['post_data'] = $_POST;
		
		header('location:login.php');
		exit;
	}

	if(password_verify($password,$info['password'])){
		$_SESSION['user'] = $info;
		$id = $info['id'];
		$sql = "Update users set isLoggedIn = true where id = '$id'";
		mysqli_query($conn,$sql);
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

		$pusher->trigger('my-channel', 'account.login', $username);
		if($info['isAdmin']){
			header('location:admin/index.php');
			return;
		}
			header('location:rhu/index.php');
			return;
	}
	$_SESSION['msg'] = array('isSucces'=>0,'msg'=>'User not found!');
	$_SESSION['post_data'] = $_POST;
	header('location:login.php');
	exit;
}





$_SESSION['msg'] = array('isSucces'=>0,'msg'=>'User not found!');
$_SESSION['post_data'] = $_POST;
header('location:login.php');
exit;
?>