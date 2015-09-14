<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customer = $service->withRelations('phones', 'badges.badgeType')->get($customer);

dd($customer);

dd($customer->getAnswersGroupedByIdentifier());

var_dump($customer->getPhones()->first('type', 'mobile'));