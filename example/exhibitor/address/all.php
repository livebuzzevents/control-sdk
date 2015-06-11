<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(3);

$service  = new \Buzz\Control\Services\Exhibitor\Address\All($exhibitor);
$response = $serviceHandler->execute($service);

var_dump($response);