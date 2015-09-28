<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$service->sendPasswordResetEmail($customer);