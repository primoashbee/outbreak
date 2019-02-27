<?php

require_once('../vendor/autoload.php');
require "../config.php";
$inputFileName = 'templates/CASES.xlsx';


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


$spreadsheet = $reader->load($inputFileName);

$morbidity = $spreadsheet->getSheet(0);

$year = 2019;
$disease_id = 3;

if(isset($_GET['year'])){
    $year = $_GET['year'];
}
if(isset($_GET['disease_id'])){
    $disease_id = $_GET['disease_id'];
}

$sql = "Select * from diseases where id = '$disease_id'";
$res = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($res);
    
$d_name = strtoupper($data['name']);

$morbidity->getCell('A4')->setValue($year);

$baranggay = getBarangay();
$number = 10;
$ctr = 1;
$morbidity->getCell('A2')->setValue($d_name.' CONTROL AND PREVENTION PROGRAM');
$morbidity->getCell('A5')->setValue('Distribution List of '.strtoupper($d_name).' Cases per MW (Morbidity Week)');
foreach ($baranggay as $k => $v) {

    $morbidity->getCell('A'.$number)->setValue($ctr); //number 
    $morbidity->getCell('B'.$number)->setValue($v['name']); //baranggay name
   

    $record = getDiseaseCountPerBaranggay($year,$disease_id,$v['id']);

    $morbidity->getCell('C'.$number)->setValue(isEmpty($record['0']));
    $morbidity->getCell('D'.$number)->setValue(isEmpty($record['1']));
    $morbidity->getCell('E'.$number)->setValue(isEmpty($record['2']));
    $morbidity->getCell('F'.$number)->setValue(isEmpty($record['3']));
    $morbidity->getCell('G'.$number)->setValue(isEmpty($record['4']));
    $morbidity->getCell('H'.$number)->setValue(isEmpty($record['5']));
    $morbidity->getCell('I'.$number)->setValue(isEmpty($record['6']));
    $morbidity->getCell('J'.$number)->setValue(isEmpty($record['7']));
    $morbidity->getCell('K'.$number)->setValue(isEmpty($record['8']));
    $morbidity->getCell('L'.$number)->setValue(isEmpty($record['9']));
    $morbidity->getCell('M'.$number)->setValue(isEmpty($record['10']));
    $morbidity->getCell('N'.$number)->setValue(isEmpty($record['11']));
    $morbidity->getCell('O'.$number)->setValue(isEmpty($record['12']));
    $morbidity->getCell('P'.$number)->setValue(isEmpty($record['13']));
    $morbidity->getCell('Q'.$number)->setValue(isEmpty($record['14']));
    $morbidity->getCell('R'.$number)->setValue(isEmpty($record['15']));
    $morbidity->getCell('S'.$number)->setValue(isEmpty($record['16']));
    $morbidity->getCell('T'.$number)->setValue(isEmpty($record['17']));
    $morbidity->getCell('U'.$number)->setValue(isEmpty($record['18']));
    $morbidity->getCell('V'.$number)->setValue(isEmpty($record['19']));
    $morbidity->getCell('W'.$number)->setValue(isEmpty($record['20']));
    $morbidity->getCell('X'.$number)->setValue(isEmpty($record['21']));
    $morbidity->getCell('Y'.$number)->setValue(isEmpty($record['22']));
    $morbidity->getCell('Z'.$number)->setValue(isEmpty($record['23']));
    $morbidity->getCell('AA'.$number)->setValue(isEmpty($record['24']));
    $morbidity->getCell('AB'.$number)->setValue(isEmpty($record['25']));
    $morbidity->getCell('AC'.$number)->setValue(isEmpty($record['26']));
    $morbidity->getCell('AD'.$number)->setValue(isEmpty($record['27']));
    $morbidity->getCell('AE'.$number)->setValue(isEmpty($record['28']));
    $morbidity->getCell('AF'.$number)->setValue(isEmpty($record['29']));
    $morbidity->getCell('AG'.$number)->setValue(isEmpty($record['30']));
    $morbidity->getCell('AH'.$number)->setValue(isEmpty($record['31']));
    $morbidity->getCell('AI'.$number)->setValue(isEmpty($record['32']));
    $morbidity->getCell('AJ'.$number)->setValue(isEmpty($record['33']));
    $morbidity->getCell('AK'.$number)->setValue(isEmpty($record['34']));
    $morbidity->getCell('AL'.$number)->setValue(isEmpty($record['35']));
    $morbidity->getCell('AM'.$number)->setValue(isEmpty($record['36']));
    $morbidity->getCell('AN'.$number)->setValue(isEmpty($record['37']));
    $morbidity->getCell('AO'.$number)->setValue(isEmpty($record['38']));
    $morbidity->getCell('AP'.$number)->setValue(isEmpty($record['39']));
    $morbidity->getCell('AQ'.$number)->setValue(isEmpty($record['40']));
    $morbidity->getCell('AR'.$number)->setValue(isEmpty($record['41']));
    $morbidity->getCell('AS'.$number)->setValue(isEmpty($record['42']));
    $morbidity->getCell('AT'.$number)->setValue(isEmpty($record['43']));
    $morbidity->getCell('AU'.$number)->setValue(isEmpty($record['44']));
    $morbidity->getCell('AV'.$number)->setValue(isEmpty($record['45']));
    $morbidity->getCell('AW'.$number)->setValue(isEmpty($record['46']));
    $morbidity->getCell('AX'.$number)->setValue(isEmpty($record['47']));
    $morbidity->getCell('AY'.$number)->setValue(isEmpty($record['48']));
    $morbidity->getCell('AZ'.$number)->setValue(isEmpty($record['49']));
    $morbidity->getCell('BA'.$number)->setValue(isEmpty($record['50']));
    $morbidity->getCell('BB'.$number)->setValue(isEmpty($record['51']));
    $morbidity->getCell('BC'.$number)->setValue(isEmpty($record['52']));
    $number++;
    $ctr++;

}

$morbidity->getProtection()->setPassword($GLOBAL_PASS);
$morbidity->getProtection()->setSheet(true);

$file ='CASES PER BARANGGAY '.strtoupper($d_name).' - '.strtoupper($year).'.xlsx';
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//$spreadsheet->getActiveSheet()->protectCells('B8:B20','PHP');

/*$spreadsheet->getActiveSheet()->getStyle('B8')
    ->getProtection()
    ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
*/
//var_dump($morbidity->getCell('BD35')->getValue());
//return; 
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