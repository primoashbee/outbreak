<?php
require "../config.php";

    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    validateLogIn($_SESSION['user']['id']);
    


$errors = array();
foreach($_POST as $k => $v){
	if($v==""){
		array_push($errors,$k." is empty");
	}
}
if(count($errors)>1){
	$_SESSION['errors'] = $errors;
	header('location:create_record.php');
	return;
}
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


$firstname = addslashes($_POST['firstname']);
$middlename = addslashes($_POST['middlename']);
$lastname = addslashes($_POST['lastname']);
$gender = addslashes($_POST['gender']);
$barangay_id = $_POST['barangay'];
$disease_id = $_POST['disease_id'];
$date_of_sickness = addslashes($_POST['date_of_sickness']);
$birthday = addslashes($_POST['birthday']);
$hospital_id = addslashes($_POST['hospital_id']);



$sql ="
SELECT * FROM records where firstname='$firstname' and middlename='$middlename' and lastname='$lastname' and gender = '$gender' and birthday = '$birthday' and barangay_id ='$barangay_id' and date_of_sickness ='$date_of_sickness' and disease_id='$disease_id' and hospital_id = '$hospital_id'";

if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
	$_SESSION['msg'] = array('isSuccess'=>0,'message'=>'Record already exists in our system');
	$_SESSION['post_data'] = $_POST;
	

	header('location:create_record.php');
	return;
}

$user_id = $_SESSION['user']['id'];
$case_id = generateCaseNumber();


$sql = "INSERT INTO records (case_id,disease_id,firstname,middlename,lastname,gender,birthday,barangay_id,date_of_sickness,hospital_id,created_by) values
('$case_id','$disease_id','$firstname','$middlename','$lastname','$gender','$birthday','$barangay_id','$date_of_sickness','$hospital_id','$user_id')";

if(mysqli_query($conn,$sql)){
$space = " ";
		$id = mysqli_insert_id($conn);
		$sql = "SELECT r.id,case_id, CONCAT(firstname,'$space',lastname) AS full_name, gender, b.`name` as barangay_name,d.`name` as disease_name,r.`date_of_sickness`, TIMESTAMPDIFF(YEAR, BIRTHDAY, CURDATE()) AS age, WEEK(date_of_sickness) as MW, h.id as h_id, h.name as hospital_name, r.status as `status`
	FROM records r
	LEFT JOIN barangays b 
	ON r.barangay_id = b.id
	LEFT JOIN diseases d
	ON r.`disease_id` = d.`id` 
	LEFT JOIN hospitals h
	ON r.hospital_id = h.id
	where r.id = '$id' ORDER BY date_of_sickness DESC ";
	  	//$sql ="Select * from records where id ='$id'";
	    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	    $pusher->trigger('my-channel', 'record.create', $data);
		$count = getDiseaseCount($disease_id,date("Y"),$barangay_id);

	if($count > 2){
		sendAlert($disease_id,$count,$barangay_id);
	}
	$_SESSION['msg'] = array('isSuccess'=>1,'message'=>'Record added');

	header('location:create_record.php');
	return;
}else{

	$_SESSION['msg'] = array('isSuccess'=>0,'message'=>'Something went wrong.');
	header('location:create_record.php');
	return;
}

