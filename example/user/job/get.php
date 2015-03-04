<?php

require_once '../../bootstrap.php';

$user = new \Buzz\Control\Objects\User(3);
$job  = new \Buzz\Control\Objects\User\Job(4);

$service  = new \Buzz\Control\Services\User\Job\Get($user, $job);
$response = $serviceHandler->execute($service);

var_dump($response);