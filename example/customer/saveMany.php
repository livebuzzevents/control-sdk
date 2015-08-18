<?php

require_once '../bootstrap.php';

$customers = [];

$start = microtime(true);

for ($i = 0; $i < 50; $i++) {
    $customer = new \Buzz\Control\Objects\Customer();

    $customer->setEmail('john.doe@livebuzz.co.uk');
    $customer->setCampaignId(1);
    $customer->setTitle('Mr');
    $customer->setFirstName('John');
    $customer->setMiddleName('Bon');
    $customer->setLastName('Doe');
    $customer->setSex('male');
    $customer->setNationality('BG');
    $customer->setLanguage('en');

    $job = new \Buzz\Control\Objects\Customer\Job();
    $job->setCompany('LiveBuzz');
    $job->setTitle('Web developer');

    $phone = new \Buzz\Control\Objects\Customer\Phone();
    $phone->setNumber('07539742762');
    $phone->setType('work');

    $address = new \Buzz\Control\Objects\Customer\Address();

    $address->setCountry('UK');
    $address->setCounty('West Midlands');
    $address->setCity('Solihull');
    $address->setPostcode('B928HH');
    $address->setLine1('57 Melton Avenue');

    $customer->addJob($job);
    $customer->addPhone($phone);
    $customer->addAddress($address);

    $customers[] = $customer;
}

$service  = new \Buzz\Control\Services\Customer\SaveMany($customers);
$response = $serviceHandler->execute($service);

var_dump(count($response));

var_dump('time' . (microtime(true) - $start));
