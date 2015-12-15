<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\LookupService($buzz);
//$response = $service->country(); // -> all countries
$response = $service->country('AA');

var_dump($response);