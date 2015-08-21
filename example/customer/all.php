<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customers = $service->where('email', 'is', 'jordan.dobrev.88@gmail.com')->getMany();

var_dump($customers);