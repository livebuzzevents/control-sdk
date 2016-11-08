<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customers = $service->where('email', 'contains', 'jordan')->getMany();

var_dump($customers->toArray());
