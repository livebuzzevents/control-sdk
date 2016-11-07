<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\SeminarService($buzz);

$seminar = new \Buzz\Control\Objects\Seminar('07a02902-0b0d-4839-8b1a-9fa4fda50011');
$creator = new \Buzz\Control\Objects\Customer('8389d5c9-bfbc-4478-8a46-8f6a34df0000');
$customer = new \Buzz\Control\Objects\Customer('563bada3-188d-4f5a-8c9d-7de12fde0000');

$service->allocateSpace($seminar, $creator, 'speaker');
dump($service->with('customers')->get($seminar)->getCustomers());

$service->assignCustomer($seminar, $creator, $creator);
dump($service->with('customers')->get($seminar)->getCustomers());

$service->attachCustomer($seminar, $creator, 'attendee', $customer);
dump($service->with('customers')->get($seminar)->getCustomers());

$service->detachSpeaker($seminar, $creator);
dump($service->with('customers')->get($seminar)->getCustomers());
