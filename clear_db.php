<?php 
	require "config.php";

	$sql="DELETE from USERS";
	mysqli_query($conn,$sql);

	$sql="DELETE from DISEASES";
	mysqli_query($conn,$sql);

	
	$sql="DELETE from HOSPITALS";
	mysqli_query($conn,$sql);

	
	$sql="DELETE from RECORDS";
	mysqli_query($conn,$sql);

	$sql="DELETE from SMS";
	mysqli_master_query(link, query)($conn,$sql);






?>