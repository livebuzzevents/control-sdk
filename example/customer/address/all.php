<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(3);

$service  = new \Buzz\Control\Services\Customer\Address\All($customer);
$response = $serviceHandler->execute($service);

var_dump($response);