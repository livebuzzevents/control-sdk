<?php

require_once '../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor();
$campaign  = new \Buzz\Control\Objects\Campaign(11);

$exhibitor->setName('API TEST');
$exhibitor->setImage(__DIR__ . '/example.png');
$exhibitor->setDetails([
    'website' => 'http://www.google.com'
]);

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(1);
$customer->setRole('leader');
$exhibitor->addCustomer($customer);

$customer = new \Buzz\Control\Objects\Exhibitor\Customer(2);
$customer->setRole('basic');
$exhibitor->addCustomer($customer);

$service  = new \Buzz\Control\Services\Exhibitor\Create($exhibitor, $campaign);
$response = $serviceHandler->execute($service);

var_dump($response);