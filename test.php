<?php 
/*
require_once "vendor/autoload.php";



$basic  = new \Nexmo\Client\Credentials\Basic('032c2fc0', 'B72Vlft6Yyff2FB5');
$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => '639335277757',
    'from' => 'ASHBEE MORGADO',
    'text' => 'HELLO ASHBEE MORGADO'
]);



require "config.php";
$records = getDiseasesCountPerWeek(2019);

foreach ($records as $key => $value) {
	//echo $value.'<br>';
}
for ($x=0;$x<=52;$x++){
	//echo 'v['.$x.']'.'<br>';
}

for($x=1;$x<=52;$x++){
	echo "\"$x\",";
}
*/
require "config.php";
echo sendAlert(2,5,3);
?> 