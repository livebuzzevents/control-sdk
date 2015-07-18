<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(3);
$address  = new \Buzz\Control\Objects\Customer\Address(5);

$service  = new \Buzz\Control\Services\Customer\Address\Get($customer, $address);
$response = $serviceHandler->execute($service);

var_dump($response);