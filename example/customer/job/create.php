<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service = new \Buzz\Control\Services\Customer\JobService($buzz);

$job = new \Buzz\Control\Objects\Customer\Job();
$job->setCompany('LiveBuzz');

$job = $service->save($customer, $job);

var_dump($job);