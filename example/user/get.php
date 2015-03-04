<?php

require_once '../bootstrap.php';

$user = new \Buzz\Control\Objects\User(3);

$service  = new \Buzz\Control\Services\User\Get($user);
$response = $serviceHandler->execute($service);

var_dump($response);