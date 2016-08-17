<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer('f1d6a89b-6f52-4c02-85aa-1a7b71140000');

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customer = $service->with('phones', 'badgeType', 'leads.lead.group')->get($customer);

dd($customer->getLeads()->first()->getLead()->getGroup());

dd($customer->getAnswersGroupedByIdentifier());

var_dump($customer->getPhones()->first('type', 'mobile'));
