<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer('9cda606c-8115-4d65-b4f2-a9a653c40000');

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customer = $service->syncTags($customer, ['mytest', 'test2']);

dd($customer);
