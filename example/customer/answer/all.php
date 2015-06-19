<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service  = new \Buzz\Control\Services\Customer\Answer\All($customer);
$response = $serviceHandler->execute($service);

var_dump($response);