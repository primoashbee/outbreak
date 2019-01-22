<?php 

function getName(){
	return "Chantal Gomez";
}

function getUsers(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from users where isDeleted=false";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getAccountByID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from users where id = '$id'";	
	if($res = mysqli_query($conn,$sql)){
		$data =mysqli_fetch_assoc($res);
		echo json_encode(array('msg'=>200,'info'=>$data));
	}else{
		echo json_encode(array('msg'=>404));	
	}
	return $res;
}

function getDiseases(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from diseases where isDeleted= false";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getDiseaseByID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from diseases where id = '$id'";
	if($res = mysqli_query($conn,$sql)){
		$data =mysqli_fetch_assoc($res);
		echo json_encode(array('msg'=>200,'info'=>$data));
	}else{
		echo json_encode(array('msg'=>404));	
	}
	return $res;
}

function checkIfUsernameExists($username){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select * from users where username = '$username'";
	
	$res = mysqli_query($conn,$sql);
	if (mysqli_num_rows($res) > 0 ){
		return true;
	}
	return false;

}
function checkIfDiseaseExists($name){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select * from diseases where name = '$name'";
	
	$res = mysqli_query($conn,$sql);
	if (mysqli_num_rows($res) > 0 ){
		return true;
	}
	return false;

}

function updateDiseaseByID($id,$name,$description){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Update diseases set name = '$name', description ='$description' where id ='$id'";
	if(mysqli_query($conn,$sql)){
		echo  json_encode(array('isSuccess'=>1,'message'=>'Disease Succesfully Updated!'));
		return;
		
	}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
		
}
function deleteDiseaseByID($id){
		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql  = "Update diseases set isDeleted = true where id ='$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Disease Succesfully Deleted!'));
			return;
			
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}
?>