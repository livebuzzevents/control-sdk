<?php

require_once '../bootstrap.php';

$filter = new \Buzz\Control\Objects\Filter();

$filter->add('email', 'like', '@gmail.com');

$service  = new \Buzz\Control\Services\Customer\All($filter);
$response = $serviceHandler->execute($service);

var_dump($response);