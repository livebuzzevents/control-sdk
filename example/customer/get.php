<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(563);

$service  = new \Buzz\Control\Services\CustomerService();

$customer = $service->get($customer);

var_dump($customer->firstWhere('phones', ['type' => 'mobile']));