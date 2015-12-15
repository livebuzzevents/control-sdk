<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\LookupService($buzz);
$response = $service->addressByTerm('UK', 'Lode Lane Solihull');

var_dump($response);