<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\LookupService($buzz);
$response = $service->addressByPostcode('UK', 'B92');

var_dump($response);