<?php

require_once 'bootstrap.php';

$user = new \Buzz\Control\Objects\User();

$user->setEmail('john.doe@livebuzz.co.uk');
$user->setTitle('Mr');
$user->setFirstName('John');
$user->setMiddleName('Bon');
$user->setLastName('Doe');
$user->setSex('male');
$user->setNationality('BG');
$user->setLanguage('en');
$user->setGroup('exhibitor');

$address = new Buzz\Control\Objects\User\Address();

$address->setType('home');
$address->setAddress('Example Address');
$address->setPostcode('B92EXA');
$address->setCity('Solihull');
$address->setCounty('West Midlands');
$address->setCountry('UK');

$user->addAddress($address);

$job = new \Buzz\Control\Objects\User\Job();

$job->setCompany('LiveBuzz');
$job->setJobTitle('Senior Web Developer');

$user->addJob($job);

$parameters = [];

$parameters[0] = new \Buzz\Control\Objects\User\Parameter();
$parameters[0]->setParameter('VAT');
$parameters[0]->setValue('VATEXAMPLE');

$parameters[1] = new \Buzz\Control\Objects\User\Parameter();
$parameters[1]->setParameter('DOB');
$parameters[1]->setValue('12-12-1990');

foreach ($parameters as $parameter) {
    $user->addParameter($parameter);
}

$service  = new \Buzz\Control\Services\User\Register($user);
$response = $serviceHandler->execute($service);

var_dump($response);