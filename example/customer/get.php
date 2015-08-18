<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service = new \Buzz\Control\Services\CustomerService();

$customer = $service->get($customer);

exit($customer->toArray());

var_dump($customer->firstWhere('phones', ['type' => 'mobile']));