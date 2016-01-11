<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\EventService($buzz);
$response = $service->getMany();

var_dump($response);