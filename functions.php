<?php 

function getName(){
	if(isset($_SESSION['user'])){
		return $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'];
	}
	return "DEMO TEST";
}
function getBarangay(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT * FROM barangays ORDER BY `NAME` ASC";
	return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
}

function hasError($params){
	return 'Meron';
}
function getPatientRecords(){
$conn = mysqli_connect("localhost","root","","outbreak"); 
$space = " ";
$sql = "SELECT r.id,case_id, CONCAT(firstname,'$space',lastname) AS full_name, gender, b.`name` as barangay_name,d.`name` as disease_name,r.`date_of_sickness`
FROM records r
LEFT JOIN barangays b 
ON r.barangay_id = b.id
LEFT JOIN diseases d
ON r.`disease_id` = d.`id` ORDER BY case_id DESC";

	return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);


}

function old($params){
if(!isset($_SESSION)){
	session_start();
}
	if(isset($_SESSION['post_data'])){
		if(array_key_exists($params,$_SESSION['post_data'])){
			return $_SESSION['post_data'][$params];
		}	
	}
	return;
}


function generateCaseNumber(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$current_year = date('Y');
	$sql = "SELECT DISTINCT(YEAR(date_of_sickness)) AS year FROM records ORDER BY year DESC LIMIT 1";

	$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$last_recorded_year  = $data['year'];

	$year_series="";

	//if year incremented revert back to Case Series to Zero
	if($current_year > $last_recorded_year){
		$year_series = "Y".$current_year;
		$case_series = "C100001";
		$case_number = $year_series.'-'.$case_series;
		return $case_number;
	}

	$sql = "SELECT case_id FROM records ORDER BY case_id DESC LIMIT 1";
	$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$last_case_id  = $data['case_id'];
	$year_series = substr($last_case_id,0,5);
	$last_case_series = substr($last_case_id, -6) + 1;

	$case_number = $year_series.'-C'.$last_case_series;
	return $case_number;

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

	$sql = "Select * from diseases where isDeleted= false order by `name` ASC";
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