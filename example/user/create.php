<?php

require_once '../bootstrap.php';

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

$service  = new \Buzz\Control\Services\User\Create($user);
$response = $serviceHandler->execute($service);

var_dump($response);