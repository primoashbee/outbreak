<?php
/**
* Example for Message create
*/

/*
require 'vendor/autoload.php';
use Plivo\RestClient;
$client = new RestClient("MAMJCXY2Y0ODUWMDHINZ", "OWU4YzM2ZDAzNmNmODNlN2NlNTYyNzBjYzg1Njkw");
try {
    $response = $client->messages->create(
        '639335277747',
        ['639772862469'],
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    );
    print_r($response);
}
catch (PlivoRestException $ex) {
    print_r(ex);
}

*/
// Required if your environment does not handle autoloading
/*
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC1cbfb39d305886bf47f229fddbcc7357';
$token = '09e03c55673726cbebfe725eb1be9822';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+63935277757',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+19138719539',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    )
);  
*/


//sendAlert(1,4,21);
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