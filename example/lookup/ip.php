<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\LookupService($buzz);
$response = $service->ip($_SERVER['REMOTE_ADDR']);

var_dump($response);