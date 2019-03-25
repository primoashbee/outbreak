<?php

require_once('../vendor/autoload.php');
require "../config.php";
$inputFileName = 'templates/LINE LIST.xlsx';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


$spreadsheet = $reader->load($inputFileName);

$morbidity = $spreadsheet->getSheet(0);

$year = 2019;
$disease_id = 3;
$from = 1;
$to = 12;

if(isset($_GET['year'])){
    $year = $_GET['year'];
}

if(isset($_GET['from'])){
    $from = $_GET['from'];
}

if(isset($_GET['to'])){
    $to = $_GET['to'];
}

/*
$sql = "Select * from diseases where id = '$disease_id'";
$res = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($res);
*/





$list = getLineList($year,$from,$to);
//$number = 10;
$ctr = 1;
$row = 6;
$morbidity->getCell('A4')->setValue(getMonthName($from)." - ".getMonthName($to)." ".$year);
foreach ($list as $k => $v) {
    $morbidity->getCell('A'.$row)->setValue($ctr);
    $morbidity->getCell('B'.$row)->setValue($v['fullname']);
    $morbidity->getCell('C'.$row)->setValue($v['age']);
    $morbidity->getCell('D'.$row)->setValue($v['gender']);
    $morbidity->getCell('E'.$row)->setValue($v['birthday']);
    $morbidity->getCell('F'.$row)->setValue($v['date_of_sickness']);
    $morbidity->getCell('G'.$row)->setValue($v['date_of_release']);
    $morbidity->getCell('H'.$row)->setValue($v['wk']+1);
    $morbidity->getCell('I'.$row)->setValue($v['hospital_name']);
    $morbidity->getCell('J'.$row)->setValue($v['baranggay_name']);
    $ctr++;
    $row++;

}


$morbidity->getProtection()->setPassword($GLOBAL_PASS);
$morbidity->getProtection()->setSheet(true);

$file ='LINE LIST ' .strtoupper($year).'.xlsx';
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//$spreadsheet->getActiveSheet()->protectCells('B8:B20','PHP');

/*$spreadsheet->getActiveSheet()->getStyle('B8')
    ->getProtection()
    ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
*/
ob_end_clean();
$writer->save($file);

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file) or die("Couldn't delete file");
    exit;
}

return;


?>