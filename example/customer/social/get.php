<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(3);
$social  = new \Buzz\Control\Objects\Customer\Social(4);

$service  = new \Buzz\Control\Services\Customer\Social\Get($customer, $social);
$response = $serviceHandler->execute($service);

var_dump($response);