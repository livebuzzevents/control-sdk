<?php

require_once '../bootstrap.php';

$email = new \Buzz\Control\Objects\EmailMessageTemplate();
$email->setIdentifier('visitor-registered');

$service = new \Buzz\Control\Services\EmailService($buzz);

$service->sendToCustomer(new \Buzz\Control\Objects\Customer(2), $email);
