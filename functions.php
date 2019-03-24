<?php 

require_once "vendor/autoload.php";
use Plivo\RestClient;
function validateLogIn($user_id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT forceLogout from USERS where id = '$user_id' and forceLogout = true ";
	if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0){
		header("location:logout.php");
	}

}
function todayForHumans(){
	return \Carbon\Carbon::now()->isoFormat('MMMM Do YYYY, h:mm:ss a');
}
function getURL(){
	return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
}
function urlHas($url,$string){
	if(strpos($url,$string)){
		return "active";
	}
	return '';
}
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
function getTips($isDeleted,$top = 0){
	if($top==0){
		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql ="SELECT * FROM tips where isDeleted = '$isDeleted' ORDER BY created_at DESC";
		return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	}else{

		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql ="SELECT * FROM tips where isDeleted = '$isDeleted' ORDER BY created_at DESC LIMIT $top";
		
		return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);

	}
}
function getMonthName($int){

	$dateObj   = DateTime::createFromFormat('!m', $int);
	return $monthName = $dateObj->format('F'); // March

}
function getHospitals(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT * FROM hospitals ORDER BY `NAME` ASC";
	return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
}
function getRecordViaID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT * FROM records where id ='$id'";
	
	return json_encode(mysqli_fetch_assoc(mysqli_query($conn,$sql)));	
}
function hasError($params){
	return 'Meron';
}
function getLineList($year,$from,$to){
	$conn = mysqli_connect("localhost","root","","outbreak");
	$space = " ";
	$sql = "SELECT 
			  r.id,
			  CONCAT(r.`firstname`,'$space', r.`lastname`) AS fullname,
			  TIMESTAMPDIFF(YEAR, r.`birthday`, CURDATE()) AS age,
			  r.gender,
			  r.`birthday`,
			  r.`date_of_sickness`,
			  r.`date_of_release`,
			  WEEK(date_of_sickness) AS wk,
			  h.`name` AS hospital_name,
			  b.`name` AS baranggay_name
			FROM
			  records r 
			LEFT JOIN barangays b
			ON r.`barangay_id` = b.`id`
			LEFT JOIN hospitals h
			ON r.`hospital_id` = h.`id` 
			WHERE YEAR(date_of_sickness) = '$year' and 
			MONTH(date_of_sickness) BETWEEN '$from' AND '$to'  
			order by date_of_sickness DESC";

			return mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);

}
function getPatientRecords($isDeleted = false,$status = "pending",$year,$from,$to){
if($year==""){
	$year = date('Y');
}
if($from==""){
	$from = 1;
}
if($to==""){
	$to = 12;
}

if($status=="all"){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$space = " ";
	$sql = "SELECT r.id,case_id, CONCAT(firstname,'$space',lastname) AS full_name, gender, b.`name` as barangay_name,d.`name` as disease_name,r.`date_of_sickness`, TIMESTAMPDIFF(YEAR, BIRTHDAY, CURDATE()) AS age, WEEK(date_of_sickness) as MW, h.id as h_id, h.name as hospital_name, r.status as `status`
	FROM records r
	LEFT JOIN barangays b 
	ON r.barangay_id = b.id
	LEFT JOIN diseases d
	ON r.`disease_id` = d.`id` 
	LEFT JOIN hospitals h
	ON r.hospital_id = h.id
	where r.isDeleted = false AND
	year(r.date_of_sickness) = '$year'
	AND
	MONTH(date_of_sickness) BETWEEN $from AND $to ORDER BY date_of_sickness DESC";
}else{
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$space = " ";
	$sql = "SELECT r.id,case_id, CONCAT(firstname,'$space',lastname) AS full_name, gender, b.`name` as barangay_name,d.`name` as disease_name,r.`date_of_sickness`, TIMESTAMPDIFF(YEAR, BIRTHDAY, CURDATE()) AS age, WEEK(date_of_sickness) as MW, h.id as h_id, h.name as hospital_name, r.status as `status`
	FROM records r
	LEFT JOIN barangays b 
	ON r.barangay_id = b.id
	LEFT JOIN diseases d
	ON r.`disease_id` = d.`id` 
	LEFT JOIN hospitals h
	ON r.hospital_id = h.id
	where r.isDeleted = false  
	and r.status = '$status'
	and year(r.date_of_sickness) = '$year' AND	
	MONTH(date_of_sickness) BETWEEN $from AND $to
	ORDER BY case_id DESC";
}
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
function getUsers($isAdmin = false,$isLoggedOut =false){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from users where isDeleted=false and isAdmin = '$isAdmin'";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getUsersDeleted(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from users where isDeleted=true and isAdmin = false and forceLogOut=true";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getYearsInRecords(){
	
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "SELECT * FROM (SELECT DISTINCT(YEAR(date_of_sickness)) AS `year` FROM records WHERE isDeleted =FALSE ) b";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getYearsInRecordsForGraph(){
	
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "SELECT * FROM (SELECT DISTINCT(YEAR(date_of_sickness)) AS `year` FROM records WHERE isDeleted =FALSE ) b order by b.year ASC";
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

function getNameByID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from users where id = '$id'";	
	if($res = mysqli_query($conn,$sql)){
		$data =mysqli_fetch_assoc($res);
		$res  = $data['firstname']. " ".$data['lastname']; 
	}else{
		$res = "";
	}
	return $res;
}

function getDiseases(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from diseases where isDeleted= false order by `name` ASC";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;
}
function getDiseaseRank($year){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "SELECT d.name, COUNT(disease_id) AS total FROM records r LEFT JOIN diseases d ON r.`disease_id` = d.`id` WHERE YEAR(r.`date_of_sickness`) = '$year' GROUP BY r.`disease_id` ORDER BY total DESC ";
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
function getHospitalByID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql = "Select * from hospitals where id = '$id'";
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
function checkIfTitleExists($title){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select * from tips where title = '$title'";
	
	$res = mysqli_query($conn,$sql);
	if (mysqli_num_rows($res) > 0 ){
		return true;
	}
	return false;

}

function checkIfHospitalExists($name){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select * from hospitals where name = '$name'";
	
	$res = mysqli_query($conn,$sql);
	if (mysqli_num_rows($res) > 0 ){
		return true;
	}
	return false;

}


function updateRecordViaID($id, $post_data){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$firstname = addslashes($post_data['firstname']);
	$middlename = addslashes($post_data['middlename']);
	$lastname = addslashes($post_data['lastname']);
	$birthday = addslashes($post_data['birthday']);
	$gender = addslashes($post_data['gender']);
	$barangay_id = addslashes($post_data['barangay']);
	$disease_id = addslashes($post_data['disease_id']);
	$date_of_sickness = addslashes($post_data['date_of_sickness']);
	$sql = "Update records set
		firstname  = '$firstname',
		middlename  = '$middlename',
		lastname = '$lastname',
		birthday = '$birthday',
		gender = '$gender',
		barangay_id = '$barangay_id',
		disease_id = '$disease_id',
		date_of_sickness = '$date_of_sickness'
		where id ='$id'";

	if(mysqli_query($conn,$sql)){
		echo  json_encode(array('isSuccess'=>1,'message'=>'Record Succesfully Updated!'));
		return;
		
	}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
		

}

function updateRecordStatusViaID($post_data){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$date_of_release = $post_data['date_of_release'];
	$status = $post_data['status'];
	$id = $post_data['id'];
	$sql = "Update records set date_of_release = '$date_of_release', `status` = '$status' where id ='$id'";

	if(mysqli_query($conn,$sql)){
		echo  json_encode(array('isSuccess'=>1,'message'=>'Record Succesfully Updated!'));
		return;
		
	}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
		

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

function updateDiseaseByID($id,$name,$description,$message){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Update diseases set name = '$name', description ='$description', message ='$message' where id ='$id'";
	if(mysqli_query($conn,$sql)){
		echo  json_encode(array('isSuccess'=>1,'message'=>'Disease Succesfully Updated!'));
		return;
		
	}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
		
}
function updateHospitalByID($id,$name,$address){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Update hospitals set name = '$name', address ='$address' where id ='$id'";
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
function deleteHospitalByID($id){
		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql  = "Update hospitals set isDeleted = true where id ='$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Hospital Succesfully Deleted!'));
			return;
			
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}
function deleteRecordViaID($id){
		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql  = "Update records set isDeleted = true where id ='$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Record Succesfully Deleted!'));
			return;
			
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}
function deleteTipViaID($id){

		$conn = mysqli_connect("localhost","root","","outbreak"); 
		$sql  = "Update tips set isDeleted = true where id ='$id'";
		if(mysqli_query($conn,$sql)){
			echo  json_encode(array('isSuccess'=>1,'message'=>'Tip Succesfully Deleted!'));
			return;
		}
		echo json_encode(array('isSuccess'=>0,'message'=>'Something went wrong'));
		return;
}

function getDiseaseCountPerBaranggay($year,$disease_id,$barangay_id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "SELECT 
		b.`name`,
		SUM(IF(WEEK(date_of_sickness)=0, 1, 0)) AS '0', 
		SUM(IF(WEEK(date_of_sickness)=1, 1, 0)) AS '1', 
		SUM(IF(WEEK(date_of_sickness)=2, 1, 0)) AS '2', 
		SUM(IF(WEEK(date_of_sickness)=3, 1, 0)) AS '3', 
		SUM(IF(WEEK(date_of_sickness)=4, 1, 0)) AS '4', 
		SUM(IF(WEEK(date_of_sickness)=5, 1, 0)) AS '5', 
		SUM(IF(WEEK(date_of_sickness)=6, 1, 0)) AS '6', 
		SUM(IF(WEEK(date_of_sickness)=7, 1, 0)) AS '7', 
		SUM(IF(WEEK(date_of_sickness)=8, 1, 0)) AS '8', 
		SUM(IF(WEEK(date_of_sickness)=9, 1, 0)) AS '9', 
		SUM(IF(WEEK(date_of_sickness)=10, 1, 0)) AS '10', 
		SUM(IF(WEEK(date_of_sickness)=11, 1, 0)) AS '11', 
		SUM(IF(WEEK(date_of_sickness)=12, 1, 0)) AS '12', 
		SUM(IF(WEEK(date_of_sickness)=13, 1, 0)) AS '13', 
		SUM(IF(WEEK(date_of_sickness)=14, 1, 0)) AS '14', 
		SUM(IF(WEEK(date_of_sickness)=15, 1, 0)) AS '15', 
		SUM(IF(WEEK(date_of_sickness)=16, 1, 0)) AS '16', 
		SUM(IF(WEEK(date_of_sickness)=17, 1, 0)) AS '17', 
		SUM(IF(WEEK(date_of_sickness)=18, 1, 0)) AS '18', 
		SUM(IF(WEEK(date_of_sickness)=19, 1, 0)) AS '19', 
		SUM(IF(WEEK(date_of_sickness)=20, 1, 0)) AS '20', 
		SUM(IF(WEEK(date_of_sickness)=21, 1, 0)) AS '21', 
		SUM(IF(WEEK(date_of_sickness)=22, 1, 0)) AS '22', 
		SUM(IF(WEEK(date_of_sickness)=23, 1, 0)) AS '23', 
		SUM(IF(WEEK(date_of_sickness)=24, 1, 0)) AS '24', 
		SUM(IF(WEEK(date_of_sickness)=25, 1, 0)) AS '25', 
		SUM(IF(WEEK(date_of_sickness)=26, 1, 0)) AS '26', 
		SUM(IF(WEEK(date_of_sickness)=27, 1, 0)) AS '27', 
		SUM(IF(WEEK(date_of_sickness)=28, 1, 0)) AS '28', 
		SUM(IF(WEEK(date_of_sickness)=29, 1, 0)) AS '29', 
		SUM(IF(WEEK(date_of_sickness)=30, 1, 0)) AS '30', 
		SUM(IF(WEEK(date_of_sickness)=31, 1, 0)) AS '31', 
		SUM(IF(WEEK(date_of_sickness)=32, 1, 0)) AS '32', 
		SUM(IF(WEEK(date_of_sickness)=33, 1, 0)) AS '33', 
		SUM(IF(WEEK(date_of_sickness)=34, 1, 0)) AS '34', 
		SUM(IF(WEEK(date_of_sickness)=35, 1, 0)) AS '35', 
		SUM(IF(WEEK(date_of_sickness)=36, 1, 0)) AS '36', 
		SUM(IF(WEEK(date_of_sickness)=37, 1, 0)) AS '37', 
		SUM(IF(WEEK(date_of_sickness)=38, 1, 0)) AS '38', 
		SUM(IF(WEEK(date_of_sickness)=39, 1, 0)) AS '39', 
		SUM(IF(WEEK(date_of_sickness)=40, 1, 0)) AS '40', 
		SUM(IF(WEEK(date_of_sickness)=41, 1, 0)) AS '41', 
		SUM(IF(WEEK(date_of_sickness)=42, 1, 0)) AS '42', 
		SUM(IF(WEEK(date_of_sickness)=43, 1, 0)) AS '43', 
		SUM(IF(WEEK(date_of_sickness)=44, 1, 0)) AS '44', 
		SUM(IF(WEEK(date_of_sickness)=45, 1, 0)) AS '45', 
		SUM(IF(WEEK(date_of_sickness)=46, 1, 0)) AS '46', 
		SUM(IF(WEEK(date_of_sickness)=47, 1, 0)) AS '47', 
		SUM(IF(WEEK(date_of_sickness)=48, 1, 0)) AS '48', 
		SUM(IF(WEEK(date_of_sickness)=49, 1, 0)) AS '49', 
		SUM(IF(WEEK(date_of_sickness)=50, 1, 0)) AS '50', 
		SUM(IF(WEEK(date_of_sickness)=51, 1, 0)) AS '51', 
		SUM(IF(WEEK(date_of_sickness)=52, 1, 0)) AS '52',
		SUM(r.`disease_id`) AS total
		FROM records r 
		LEFT JOIN barangays b
		ON r.`barangay_id` = b.`id` 
		WHERE r.`disease_id` = '$disease_id' AND r.`barangay_id` = '$barangay_id' and YEAR(r.date_of_sickness) = '$year'
		GROUP BY b.`name`";

		$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		return $res;


}
function isEmpty($item){
	if($item == "" || $item == 0){
		return 0;
	}
	return $item;
}
function getDiseasesYearly(){
	$years = getYearsInRecords();
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$str = "";
	foreach($years as $k => $v){

		$str .="SUM(IF(YEAR(r.`date_of_sickness`) = ".$v['year']." ,1,0)) AS '".$v['year']."',";
	}

	$sql ="SELECT 
			d.`name`,".$str."COUNT(r.`disease_id`) AS total
			FROM records r 
			LEFT JOIN diseases d 
			ON r.`disease_id` = d.`id`
			GROUP BY disease_id";

	echo $sql;
	return;
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;

}
function getDiseasesCountPerYear(){
	//$conn = mysqli_connect("localhost","root","","outbreak"); 
	$years = getYearsInRecordsForGraph();
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$str = "";
	foreach($years as $k => $v){

		$str .="SUM(IF(YEAR(r.`date_of_sickness`) = ".$v['year']." ,1,0)) AS '".$v['year']."',";
	}

	$sql ="SELECT 
			d.`name`,".$str."COUNT(r.`disease_id`) AS total
			FROM records r 
			LEFT JOIN diseases d 
			ON r.`disease_id` = d.`id`
			GROUP BY disease_id";

	//echo $sql.'<br>';
	$res = mysqli_fetch_all(mysqli_query($conn,$sql));

	return $res;

}

function getDiseasesCountPerMonth($year){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT 
    d.name,
    SUM(IF(MONTH(date_of_sickness)=1, 1, 0)) AS 'January',
    SUM(IF(MONTH(date_of_sickness)=2, 1, 0)) AS 'February',
    SUM(IF(MONTH(date_of_sickness)=3, 1, 0)) AS 'March',
    SUM(IF(MONTH(date_of_sickness)=4, 1, 0)) AS 'April',
    SUM(IF(MONTH(date_of_sickness)=5, 1, 0)) AS 'May',
    SUM(IF(MONTH(date_of_sickness)=6, 1, 0)) AS 'June',
    SUM(IF(MONTH(date_of_sickness)=7, 1, 0)) AS 'July',
    SUM(IF(MONTH(date_of_sickness)=8, 1, 0)) AS 'August',
    SUM(IF(MONTH(date_of_sickness)=9, 1, 0)) AS 'September',
    SUM(IF(MONTH(date_of_sickness)=10, 1, 0)) AS 'October',
    SUM(IF(MONTH(date_of_sickness)=11, 1, 0)) AS 'November',
    SUM(IF(MONTH(date_of_sickness)=12, 1, 0)) AS 'December',
    COUNT(r.`disease_id`) AS total
FROM records r

LEFT JOIN diseases d 
ON r.`disease_id` = d.`id`
WHERE YEAR(date_of_sickness) = '$year'
GROUP BY disease_id";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;

}

function getDiseasesCountPerWeek($year){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT 
    d.name,
    SUM(IF(WEEK(date_of_sickness)=1, 1, 0)) AS '1', 
	SUM(IF(WEEK(date_of_sickness)=2, 1, 0)) AS '2', 
	SUM(IF(WEEK(date_of_sickness)=3, 1, 0)) AS '3', 
	SUM(IF(WEEK(date_of_sickness)=4, 1, 0)) AS '4', 
	SUM(IF(WEEK(date_of_sickness)=5, 1, 0)) AS '5', 
	SUM(IF(WEEK(date_of_sickness)=6, 1, 0)) AS '6', 
	SUM(IF(WEEK(date_of_sickness)=7, 1, 0)) AS '7', 
	SUM(IF(WEEK(date_of_sickness)=8, 1, 0)) AS '8', 
	SUM(IF(WEEK(date_of_sickness)=9, 1, 0)) AS '9', 
	SUM(IF(WEEK(date_of_sickness)=10, 1, 0)) AS '10', 
	SUM(IF(WEEK(date_of_sickness)=11, 1, 0)) AS '11', 
	SUM(IF(WEEK(date_of_sickness)=12, 1, 0)) AS '12', 
	SUM(IF(WEEK(date_of_sickness)=13, 1, 0)) AS '13', 
	SUM(IF(WEEK(date_of_sickness)=14, 1, 0)) AS '14', 
	SUM(IF(WEEK(date_of_sickness)=15, 1, 0)) AS '15', 
	SUM(IF(WEEK(date_of_sickness)=16, 1, 0)) AS '16', 
	SUM(IF(WEEK(date_of_sickness)=17, 1, 0)) AS '17', 
	SUM(IF(WEEK(date_of_sickness)=18, 1, 0)) AS '18', 
	SUM(IF(WEEK(date_of_sickness)=19, 1, 0)) AS '19', 
	SUM(IF(WEEK(date_of_sickness)=20, 1, 0)) AS '20', 
	SUM(IF(WEEK(date_of_sickness)=21, 1, 0)) AS '21', 
	SUM(IF(WEEK(date_of_sickness)=22, 1, 0)) AS '22', 
	SUM(IF(WEEK(date_of_sickness)=23, 1, 0)) AS '23', 
	SUM(IF(WEEK(date_of_sickness)=24, 1, 0)) AS '24', 
	SUM(IF(WEEK(date_of_sickness)=25, 1, 0)) AS '25', 
	SUM(IF(WEEK(date_of_sickness)=26, 1, 0)) AS '26', 
	SUM(IF(WEEK(date_of_sickness)=27, 1, 0)) AS '27', 
	SUM(IF(WEEK(date_of_sickness)=28, 1, 0)) AS '28', 
	SUM(IF(WEEK(date_of_sickness)=29, 1, 0)) AS '29', 
	SUM(IF(WEEK(date_of_sickness)=30, 1, 0)) AS '30', 
	SUM(IF(WEEK(date_of_sickness)=31, 1, 0)) AS '31', 
	SUM(IF(WEEK(date_of_sickness)=32, 1, 0)) AS '32', 
	SUM(IF(WEEK(date_of_sickness)=33, 1, 0)) AS '33', 
	SUM(IF(WEEK(date_of_sickness)=34, 1, 0)) AS '34', 
	SUM(IF(WEEK(date_of_sickness)=35, 1, 0)) AS '35', 
	SUM(IF(WEEK(date_of_sickness)=36, 1, 0)) AS '36', 
	SUM(IF(WEEK(date_of_sickness)=37, 1, 0)) AS '37', 
	SUM(IF(WEEK(date_of_sickness)=38, 1, 0)) AS '38', 
	SUM(IF(WEEK(date_of_sickness)=39, 1, 0)) AS '39', 
	SUM(IF(WEEK(date_of_sickness)=40, 1, 0)) AS '40', 
	SUM(IF(WEEK(date_of_sickness)=41, 1, 0)) AS '41', 
	SUM(IF(WEEK(date_of_sickness)=42, 1, 0)) AS '42', 
	SUM(IF(WEEK(date_of_sickness)=43, 1, 0)) AS '43', 
	SUM(IF(WEEK(date_of_sickness)=44, 1, 0)) AS '44', 
	SUM(IF(WEEK(date_of_sickness)=45, 1, 0)) AS '45', 
	SUM(IF(WEEK(date_of_sickness)=46, 1, 0)) AS '46', 
	SUM(IF(WEEK(date_of_sickness)=47, 1, 0)) AS '47', 
	SUM(IF(WEEK(date_of_sickness)=48, 1, 0)) AS '48', 
	SUM(IF(WEEK(date_of_sickness)=49, 1, 0)) AS '49', 
	SUM(IF(WEEK(date_of_sickness)=50, 1, 0)) AS '50', 
	SUM(IF(WEEK(date_of_sickness)=51, 1, 0)) AS '51', 
	SUM(IF(WEEK(date_of_sickness)=52, 1, 0)) AS '52', 
	    COUNT(r.`disease_id`) AS total
	FROM records r

	LEFT JOIN diseases d 
	ON r.`disease_id` = d.`id`
	WHERE YEAR(date_of_sickness) = '$year'
	GROUP BY disease_id";
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	
	return $res;

}
function lineGraphXLabel($day){
	$date = new DateTime(date("Y-m-d"));
	$date->modify("-".$day." day");
	return $date->format("Y-m-d");

}
function getDiseasesCountPer7Days($year){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql ="SELECT 
		  d.name,  
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 0,1,0)
		  ) AS '0',
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 1,1,0)
		  ) AS '1',
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 2,1,0)
		  ) AS '2',
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 3,1,0)
		  ) AS '3',		  
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 4,1,0)
		  ) AS '4',		  
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 5,1,0)
		  ) AS '5',
		  SUM(
		    IF( DAYOFYEAR(CURDATE())  - DAYOFYEAR(r.`date_of_sickness`) = 6,1,0)
		  ) AS '6',		  
		  COUNT(r.`disease_id`) AS total
			FROM
			  records r 
			  LEFT JOIN diseases d 
			    ON r.`disease_id` = d.`id` 
			WHERE date_of_sickness BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) 
			  AND CURDATE() 
			  AND YEAR(date_of_sickness) = '$year' 
			GROUP BY r.`disease_id`";
			
	$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
	return $res;

}

function isZero($value){
	if($value=="" || $value == 0){
		return 0;
	}
	return $value;
}

function mapColor($barangay_id,$year,$disease_id){
	//$x = ['green','orange','red'];
	$month = date("m");

	$sql ="SELECT COUNT(disease_id) AS total FROM records WHERE barangay_id = '$barangay_id' AND YEAR(date_of_sickness) = '$year' and disease_id='$disease_id' and month(date_of_sickness) = '$month'";
	
	if($disease_id=="all"){
	$sql ="SELECT COUNT(disease_id) AS total FROM records WHERE barangay_id = '$barangay_id' AND YEAR(date_of_sickness) = '$year' and month(date_of_sickness) = '$month'";
	//echo $sql;	
	}


	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$count = $res['total'];
	//return $count;
	if($count  < 3){
		return 'green';
	}elseif($count < 5){
		return 'orange';
	}else{
	return 'red';
	}
}


function getDiseaseCount($disease_id,$year,$barangay_id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql ="SELECT COUNT(disease_id) AS total FROM records WHERE disease_id = '$disease_id' AND YEAR(date_of_sickness) = '$year' AND barangay_id = '$barangay_id'";
	$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$count = $res['total'];
	return $count;
}

function sendAlert($disease_id,$count,$barangay_id){
	$xml = $xml=simplexml_load_file("setup.xml");

	if($xml->sms->activated=="true"){
	$conn = mysqli_connect("localhost","root","","outbreak"); 

	$sql ="SELECT * FROM diseases WHERE id = '$disease_id'";
	//echo $sql;
	$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$name = $res['name']; //disease name
	$message = $res['message']; //disease message

	$sql ="SELECT * FROM barangays WHERE id = '$barangay_id'";
	//echo $sql;
	$res2 = mysqli_fetch_assoc(mysqli_query($conn,$sql));

	$brgy_name = strtoupper($res2['name']); //brgy name
	$contact = $res2['contact']; //brgy contact

	if($count  < 3){
		$color =  'GREEN';
		
	}elseif($count < 5){
		$color = 'ORANGE';

	}else{
	 	$color = 'RED';
	}
	$basic  = new \Nexmo\Client\Credentials\Basic('032c2fc0', 'B72Vlft6Yyff2FB5');
	$client = new \Nexmo\Client($basic);

	$prefix = strtoupper($name). " ALERT! ".\Carbon\Carbon::now()->format('Y-m-d h:i:s A').". ";

 	$brgy_list = getBarangay();

	$text = $xml->note->msg;
 	$text= str_replace("[brgy]", $brgy_name, $text);
 	$text= str_replace("[color]", $color, $text);

 	$sms = $prefix.$text;
	$num =  "+63".substr($brgy_list[1]['contact'],1);
	
	$to_send = array();
	
	foreach ($brgy_list as $key => $value) {
		$num =  "+63".substr($value['contact'],1);
		if(!in_array($num, $to_send)){
			array_push($to_send, $num);
		}
		
	}
	
	
	
	/*
		$message = $client->message()->send([
		    'to' => '+639335277757',
		    'from' => 'Nexmo',
		    'text' => $sms
		]);
	*/
	
	foreach ($to_send as $k => $v) {
		$message = $client->message()->send([
		    'to' => $v,
		    'from' => 'Nexmo',
		    'text' => $sms
		]);


	}
	

	$sms = addslashes($sms);
   
 	$sql = "Insert into sms (message,disease_id,barangay_id,count,disease_name,barangay_name,color) values ('$sms','$disease_id','$barangay_id','$count','$name','$brgy_name','$color')";
 	mysqli_query($conn,$sql);
	//echo $sql;

/*
	
	try {
		foreach ($brgy_list as $k => $v) {
			echo "Send to ".$v['contact'];
			$response = $client->messages->create(
	         $v['contact'],
	        ['639772862469'],
	        $text
	    );

 		}

	    	    //print_r($response);
	}
	catch (Exception $e) {
	    //print_r(ex);
	    echo 'NOT ENOUGH CREDITS';
	    //echo $e->getMessage();
	}

*/

}else{

}
}

function getSMSAlert(){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select * from sms order by created_at DESC";
	$res = $data = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);

	return $res;
}

function getMessageByDiseaseID($id){
	$conn = mysqli_connect("localhost","root","","outbreak"); 
	$sql = "Select message from diseases where id = '$id'";
	return mysqli_fetch_assoc(mysqli_query($conn,$sql))['message'];
}
?>