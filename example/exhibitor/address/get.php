<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(3);
$address   = new \Buzz\Control\Objects\Exhibitor\Address(5);

$service  = new \Buzz\Control\Services\Exhibitor\Address\Get($exhibitor, $address);
$response = $serviceHandler->execute($service);

var_dump($response);