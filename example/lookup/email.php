<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\LookupService($buzz);
$response = $service->email('support@livebuzz.co.uk');

var_dump($response);