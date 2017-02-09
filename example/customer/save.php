<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(54);

$customer->setEmail('john.doe@livebuzz.co.uk');
$customer->setTitle('Mr');
$customer->setFirstName('John');
$customer->setMiddleName('Bon');
$customer->setLastName('Doe');
$customer->setSex('male');
$customer->setNationality('BG');
$customer->setLanguage('en');

$service  = new \Buzz\Control\Services\CustomerService($buzz);
$response = $service->disableDupeCheck()->save($customer);

var_dump($response);
