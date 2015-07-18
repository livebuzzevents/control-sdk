<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(3);
$job      = new \Buzz\Control\Objects\Customer\Job(4);

$service  = new \Buzz\Control\Services\Customer\Job\Get($customer, $job);
$response = $serviceHandler->execute($service);

var_dump($response);