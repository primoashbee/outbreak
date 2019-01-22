<?php 
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();

	}
	$app_title = "OUTBREAK MONITORING";
	require "functions.php";
?>