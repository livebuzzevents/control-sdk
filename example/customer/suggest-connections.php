<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(10);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$connections = $service->suggestConnections($customer);

dd($connections);
