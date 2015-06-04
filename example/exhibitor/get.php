<?php

require_once '../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(9);

$service  = new \Buzz\Control\Services\Exhibitor\Get($exhibitor);
$response = $serviceHandler->execute($service);

var_dump($response);