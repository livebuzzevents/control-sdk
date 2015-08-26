<?php

require_once '../bootstrap.php';

$campaign = new \Buzz\Control\Objects\Campaign();
$campaign->setIdentifier('bbf16');

$email = new \Buzz\Control\Objects\Email();
$email->setIdentifier('visitor-registered');
$email->setCampaign($campaign);

$service = new \Buzz\Control\Services\EmailService($buzz);

$service->sendToCustomer(new \Buzz\Control\Objects\Customer(2), $email);