<?php
/**
* Example for Message create
*/
require 'vendor/autoload.php';
use Plivo\RestClient;
$client = new RestClient("MAMJCXY2Y0ODUWMDHINZ", "OWU4YzM2ZDAzNmNmODNlN2NlNTYyNzBjYzg1Njkw");
try {
    $response = $client->messages->create(
        '639335277747',
        ['639335277757'],
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    );
    print_r($response);
}
catch (PlivoRestException $ex) {
    print_r(ex);
}