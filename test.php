<?php 
require_once "vendor/autoload.php";



$basic  = new \Nexmo\Client\Credentials\Basic('032c2fc0', 'B72Vlft6Yyff2FB5');
$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => '639335277757',
    'from' => 'ASHBEE MORGADO',
    'text' => 'HELLO ASHBEE MORGADO'
]);



?> 