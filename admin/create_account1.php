<?php
require "../config.php";
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
}
if($_SESSION['user']['isAdmin']==0){
    header('location:../index.php');   
}

$errors = array();
foreach($_POST as $k => $v){
	if($v==""){
		array_push($errors,$k." is empty");
	}
}


require_once('../vendor/autoload.php');

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





if(count($errors)>1){
	//go back and send errors
}

$username = addslashes($_POST['username']);
$firstname = addslashes($_POST['firstname']);
$lastname = addslashes($_POST['lastname']);
$password = addslashes($_POST['password']);
$password_confirmation = addslashes($_POST['password_confirmation']);

if($password != $password_confirmation){
	$_SESSION['msg'] = array('isSuccess'=>0,'message'=>'Password must Match');
	$_SESSION['post_data'] = $_POST;
	header('location:create_account.php');
	return;
}
if(!checkIfUsernameExists($username)){
	$password = password_hash($password,PASSWORD_DEFAULT);
	$sql ="Insert into users(username,firstname,lastname,password) values 
	('$username','$firstname','$lastname','$password');";
	if(mysqli_query($conn,$sql)){
		$id = mysqli_insert_id($conn);
	  	$sql ="Select * from users where id ='$id'";
	    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $pusher->trigger('my-channel', 'account.create', $data);

		$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Account Succesfully Created!');
		header('location:create_account.php');
	}else{
		echo 'di nag save';
	}
}else{
	$_SESSION['msg'] =array('isSuccess'=>0,'message'=>'Username Already Exists');
	header('location:create_account.php');
}



?>