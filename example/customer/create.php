<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer();
$campaign = new \Buzz\Control\Objects\Campaign(1);

$customer->setEmail('john.doe@livebuzz.co.uk');
$customer->setTitle('Mr');
$customer->setFirstName('John');
$customer->setMiddleName('Bon');
$customer->setLastName('Doe');
$customer->setSex('male');
$customer->setNationality('BG');
$customer->setLanguage('en');

$service  = new \Buzz\Control\Services\Customer\Create($customer, $campaign);
$response = $serviceHandler->execute($service);

var_dump($response);