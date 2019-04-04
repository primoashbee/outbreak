<?php 
require "../config.php";
    session_start();
    if(!isset($_SESSION['user'])){
       echo 'INVALID REQUEST';
       return;
    }
   

if($_POST['type']=="get_disease"){
	return getDiseaseByID($_POST['id']);
}
if($_POST['type']=="release_record_via_id"){
	updateRecordStatusViaID($_POST);
	return;
}
if($_POST['type']=="get_hospital"){
	return getHospitalByID($_POST['id']);
}
if($_POST['type']=="get_tip_via_id"){
	echo getTipViaID($_POST['id']);
}
if($_POST['type']=="delete_record_via_id"){
	return deleteRecordViaID($_POST['id']);
}
if($_POST['type']=="delete_tip_via_id"){
	return deleteTipViaID($_POST['id']);
}
if($_POST['type']=="hide_tip_via_id"){

	return hideTipViaID($_POST['id']);
}
if($_POST['type']=="show_tip_via_id"){
	return showTipViaID($_POST['id']);
}
if($_POST['type']=="update_record_via_id"){
	return updateRecordViaID($_POST['id'],$_POST);
}
if($_POST['type']=="get_record_via_id"){

	echo getRecordViaID($_POST['id']);
	return;
}
if($_POST['type']=="get_account_by_id"){
	return getAccountByID($_POST['id']);
}
if($_POST['type']=="update_disease_via_id"){
	$name = addslashes($_POST['name']);
	$description = addslashes($_POST['description']);
	$message = addslashes($_POST['message']);
	return updateDiseaseByID($_POST['id'],$name,$description,$message);
}
if($_POST['type']=="update_hospital_via_id"){
	$name = addslashes($_POST['name']);
	$address = addslashes($_POST['address']);
	return updateHospitalByID($_POST['id'],$name,$address);
}
if($_POST['type']=="delete_disease_via_id"){
	$id = $_POST['id'];
	return deleteDiseaseByID($id);
}
if($_POST['type']=="delete_hospital_via_id"){
	$id = $_POST['id'];
	return deleteHospitalByID($id);
}
if($_POST['type']=="update_user_via_id"){
	$id = $_POST['id'];
	$firstname = addslashes($_POST['firstname']);
	$lastname = addslashes($_POST['lastname']);



	if(isset($_POST['password'])){
		$password  =password_hash($_POST['password'],PASSWORD_DEFAULT);
		$sql ="Update users set firstname='$firstname', lastname='$lastname', password='$password' where id = '$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Account Succesffuly Updated!'));
			return;
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;

	}else{

		$sql ="Update users set firstname='$firstname', lastname='$lastname' where id = '$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Account Succesffuly Updated!'));
			return;
		}
	}
	return;
}
if($_POST['type']=="change_password_via_id"){
	$id = $_POST['id'];
	$password  = addslashes($_POST['password']);
	$password = password_hash($password,PASSWORD_DEFAULT);
	$sql ="Update users set password='$password' where id = '$id'";
	if(mysqli_query($conn,$sql)){
		echo  json_encode(array('isSuccess'=>1,'message'=>'Account Succesffuly Updated!'));
		return;
	}
	echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
	return;
}

if($_POST['type']=="delete_user_via_id"){
	$id = $_POST['id'];
	$sql ="Update users set isDeleted = true, forceLogOut = true, isLoggedIn = false where id ='$id'";

		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Account Succesffuly Suspended!'));
			return;
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}

if($_POST['type']=="recover_user_via_id"){
	$id = $_POST['id'];
	$sql ="Update users set isDeleted = false, forceLogOut = false, isLoggedIn = false where id ='$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Account Succesffuly Recovered!'));
			return;
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}

echo 'Invalid Request';
return 'Invalid Request';
?>