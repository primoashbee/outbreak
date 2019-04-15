
<?php 
	date_default_timezone_set('asia/manila');

	//$filename ='db.sql';
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());

	 
	    /*
	    $sql ="CREATE DATABASE IF NOT EXISTS outbreak;";
	    $con = mysqli_connect("localhost","root","");
	    $con = mysqli_query($con,$sql);

	    $filename ='db.sql';


		$host = "localhost";
		$dbname = "outbreak";
		$user = "root";
		$pass = "";

		//$sql = fread($sql_file, filesize('db.sql'));
		$sql = file_get_contents($filename);	
	
		$conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname , $user, $pass);

		$conn->exec($sql);
			


		header( "refresh:1;" );
		*/
		return;
	}
	
	$app_title = "OUTBREAK MONITORING";
	$GLOBAL_PASS  = "outbreak2019";	
	$sql = "Select * from users where username = 'admin'";
		
	if(mysqli_num_rows(mysqli_query($conn,$sql)) == 0 ){
		$password = password_hash('password1234',PASSWORD_DEFAULT);
		$sql = "Insert into users (username,firstname,lastname,password,isAdmin) values 
		('admin','Administrator','Account','$password',true)";
		mysqli_query($conn,$sql);
	}

	require "functions.php";
	require 'vendor/autoload.php';
?>