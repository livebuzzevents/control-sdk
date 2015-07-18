<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(563);

$service = new \Buzz\Control\Services\Customer\JobService();

$jobs = $service->getMany($customer);

var_dump($jobs);