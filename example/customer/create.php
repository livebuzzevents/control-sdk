<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer();

$customer->setEmail('john.doe@livebuzz.co.uk');
$customer->setTitle('Mr');
$customer->setFirstName('John');
$customer->setMiddleName('Bon');
$customer->setLastName('Doe');
$customer->setSex('male');
$customer->setNationality('BG');
$customer->setLanguage('en');

$service  = new \Buzz\Control\Services\Customer\Create($customer);
$response = $serviceHandler->execute($service);

var_dump($response);