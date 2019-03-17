<?php 

require "../config.php";

$date = \Carbon\Carbon::parse('2019-02-13 11:08:18');


//var_dump(\Carbon\Carbon::now()->toDateTimeString());
var_dump($date->diffForHumans());


?>
