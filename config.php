<?php 
	date_default_timezone_set('asia/manila');
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();

	}
	$app_title = "OUTBREAK MONITORING";
	
	$sql = "Select * from users where username = 'admin'";
	if(mysqli_num_rows(mysqli_query($conn,$sql)) == 0 ){
		$password = password_hash('password1234',PASSWORD_DEFAULT);
		$sql = "Insert into users (username,firstname,lastname,password) values 
		('admin','Administrator','Account','$password')";
		mysqli_query($conn,$sql);
	}
	require "functions.php";
	require 'vendor/autoload.php';
?>