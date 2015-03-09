<?php

require_once '../../bootstrap.php';

$user      = new \Buzz\Control\Objects\User(8);
$parameter = new \Buzz\Control\Objects\Parameter(1);

$property = new \Buzz\Control\Objects\User\Property();
$property->setParameter($parameter);
$property->setValue('123qwe');

$service  = new \Buzz\Control\Services\User\Property\Create($user, $property);
$response = $serviceHandler->execute($service);

var_dump($response);