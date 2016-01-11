<?php

require_once '../bootstrap.php';

$event = new \Buzz\Control\Objects\Event(1);

$service  = new \Buzz\Control\Services\EventService($buzz);
$response = $service->get($event);

var_dump($response);