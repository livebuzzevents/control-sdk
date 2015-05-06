<?php

require_once '../../bootstrap.php';

$customer  = new \Buzz\Control\Objects\Customer(3);
$phone = new \Buzz\Control\Objects\Customer\Phone(5);

$service  = new \Buzz\Control\Services\Customer\Phone\Get($customer, $phone);
$response = $serviceHandler->execute($service);

var_dump($response);