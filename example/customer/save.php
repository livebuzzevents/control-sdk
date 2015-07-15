<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(54);

$customer->setEmail('john.doe@livebuzz.co.uk');
$customer->setCampaignId(1);
$customer->setTitle('Mr');
$customer->setFirstName('John');
$customer->setMiddleName('Bon');
$customer->setLastName('Doe');
$customer->setSex('male');
$customer->setNationality('BG');
$customer->setLanguage('en');

$service  = new \Buzz\Control\Services\Customer\Save($customer);
$response = $serviceHandler->execute($service);

var_dump($response);