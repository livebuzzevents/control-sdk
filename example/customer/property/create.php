<?php

require_once '../../bootstrap.php';

$customer  = new \Buzz\Control\Objects\Customer(8);
$parameter = new \Buzz\Control\Objects\Parameter(1);

$property = new \Buzz\Control\Objects\Customer\Property();
$property->setParameter($parameter);
$property->setValue('123qwe');

$service  = new \Buzz\Control\Services\Customer\Property\Create($customer, $property);
$response = $serviceHandler->execute($service);

var_dump($response);