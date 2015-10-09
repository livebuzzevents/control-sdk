<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

$campaign = new \Buzz\Control\Objects\Campaign();
$campaign->setIdentifier('bbf16');

$stream = new \Buzz\Control\Objects\Stream();
$stream->setIdentifier('reg');
$stream->setCampaign($campaign);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$service->socialConnect('linkedin');
