<?php

require "../config.php";
session_start();
$id = $_SESSION['user']['id'];
$sql = "Update users set isLoggedIn = false where id ='$id'";
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

		$pusher->trigger('my-channel', 'account.logout', $_SESSION['user']['username']);


session_destroy();
header('location:../login.php');
?>