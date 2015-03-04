<?php

require_once '../../bootstrap.php';

$user    = new \Buzz\Control\Objects\User(3);
$address = new \Buzz\Control\Objects\User\Address(5);

$service  = new \Buzz\Control\Services\User\Address\Get($user, $address);
$response = $serviceHandler->execute($service);

var_dump($response);