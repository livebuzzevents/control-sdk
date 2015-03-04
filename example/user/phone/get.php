<?php

require_once '../../bootstrap.php';

$user  = new \Buzz\Control\Objects\User(3);
$phone = new \Buzz\Control\Objects\User\Phone(5);

$service  = new \Buzz\Control\Services\User\Phone\Get($user, $phone);
$response = $serviceHandler->execute($service);

var_dump($response);