<?php

require_once '../../bootstrap.php';

$customer     = new \Buzz\Control\Objects\Customer(1);
$campaign = new \Buzz\Control\Objects\Campaign(1);

$service  = new \Buzz\Control\Services\Customer\Answer\All($customer, $campaign);
$response = $serviceHandler->execute($service);

var_dump($response);