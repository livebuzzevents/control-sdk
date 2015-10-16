<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(15849);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$exhibitors = $service->suggestExhibitors($customer, 15);

dd($exhibitors);
