<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(1);

$service  = new \Buzz\Control\Services\Exhibitor\Answer\All($exhibitor);
$response = $serviceHandler->execute($service);

var_dump($response);