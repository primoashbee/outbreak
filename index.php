<?php 
session_start();

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	if($user['isAdmin']){
		header('location:admin/index.php');
		exit;
	}
	header('location:rhu/index.php');
	exit;
}
header('location:site/index.php');
exit;
?>