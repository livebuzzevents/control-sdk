<?php

require_once '../../bootstrap.php';

$user = new \Buzz\Control\Objects\User();

$user->setId(3);

$service  = new \Buzz\Control\Services\User\Job\All($user);
$response = $serviceHandler->execute($service);

var_dump($response);