<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$stream = new \Buzz\Control\Objects\Stream();
$stream->setIdentifier('reg');

$service = new \Buzz\Control\Services\CustomerService($buzz);

$url = $service->socialConnect('linkedin');

dd($url);
