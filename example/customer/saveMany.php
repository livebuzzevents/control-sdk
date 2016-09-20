<?php

use Buzz\Control\Objects\Customer;

require_once '../bootstrap.php';

$customers = [];

$start = microtime(true);

//example1
//for ($i = 0; $i < 50; $i++) {
//    $customer = new Customer();
//
//    $customer->setEmail('john.doe@livebuzz.co.uk');
//    $customer->setCampaignId(1);
//    $customer->setTitle('Mr');
//    $customer->setFirstName('John');
//    $customer->setMiddleName('Bon');
//    $customer->setLastName('Doe');
//    $customer->setSex('male');
//    $customer->setNationality('BG');
//    $customer->setLanguage('en');
//
//    $job = new Job();
//    $job->setCompany('LiveBuzz');
//    $job->setTitle('Web developer');
//
//    $phone = new Phone();
//    $phone->setNumber('07539742762');
//    $phone->setType('work');
//
//    $address = new Address();
//
//    $address->setCountry('UK');
//    $address->setCounty('West Midlands');
//    $address->setCity('Solihull');
//    $address->setPostcode('B928HH');
//    $address->setLine1('57 Melton Avenue');
//
//    $customer->addJob($job);
//    $customer->addPhone($phone);
//    $customer->addAddress($address);
//
//    $customers[] = $customer;
//}

//example2
$customer = new Customer('4cedf589-ea94-496e-93f0-49b41c6b0000');
$customer->setStatus('cancelled');
$customers[] = $customer;
$customer    = new Customer('bfcacf27-6f5a-4efc-878b-5406dee90000');
$customer->setStatus('cancelled');
$customers[] = $customer;

$service  = new \Buzz\Control\Services\CustomerService($buzz);
$response = $service->saveMany($customers);

var_dump($response);

var_dump('time' . (microtime(true) - $start));
