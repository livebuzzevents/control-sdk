<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(9);

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(1);
$customer->setRole('leader');
$customers[] = $customer;

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(2);
$customer->setRole('basic');
$customers[] = $customer;

$service  = new \Buzz\Control\Services\Exhibitor\Customer\Attach($exhibitor, $customers);
$response = $serviceHandler->execute($service);

var_dump($response);