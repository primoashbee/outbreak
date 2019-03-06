<?php

require "../config.php";
sendAlert(1,4,21);
return;

require_once(__DIR__ . '/vendor/autoload.php');
$inputFileName = '../templates/MORBIDITY-MORTALITY.xlsx';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

echo password_hash("!unLocked1234",PASSWORD_DEFAULT);

return;



// Configure HTTP basic authorization: BasicAuth
$config = ClickSend\Configuration::getDefaultConfiguration()
              ->setUsername('ashbeemorgado')
              ->setPassword('!unLocked1234');

$apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);
$msg = new \ClickSend\Model\SmsMessage();
$msg->setBody("SMS

DENGUE ALERT!!!!
(FEB. 13, 2019 14:00PM)

THIS IS TO INFORM YOU THAT BARANGAY DANGCOL IS ON YELLOW WARNING...
HERE ARE SOME TIPS TO PREVENT DENGUE:
1.USE/WEAR INSECT REPELLENTS
2.DRAIN AND DUMP STANDING WATERS FOUND IN CONTAINERS INSIDE AND AROUND THE HOUSE
3.INSTALL OR FIX SCREENS ON WINDOWS AND DOORS
4.SPRAY ADULTICIDE AROUND BARANGAY
FOR MORE HEALTH TIPS, VISIT(PUBLIC WEBSITE).
PLEASE BE AWARE AND KEEPSAFE!
"); 
$msg->setTo("09335277757");
$msg->setSource("sdk");

// \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
$sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
$sms_messages->setMessages([$msg]);

try {
    $result = $apiInstance->smsSendPost($sms_messages);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
}
?>


?>