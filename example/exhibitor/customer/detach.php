<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(9);

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(1);
$customers[] = $customer;

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(2);
$customers[] = $customer;

$service  = new \Buzz\Control\Services\Exhibitor\Customer\Detach($exhibitor, $customers);
$response = $serviceHandler->execute($service);

var_dump($response);