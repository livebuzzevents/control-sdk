<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(563);

$service = new \Buzz\Control\Services\Customer\AnswerService();

$answers = $service->getMany($customer);

var_dump($answers);