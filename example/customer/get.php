<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service = new \Buzz\Control\Services\CustomerService();

$customer = $service->get($customer);

var_dump($customer->getPhones()->first('type', 'mobile'));