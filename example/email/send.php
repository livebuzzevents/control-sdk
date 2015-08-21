<?php

require_once '../bootstrap.php';

$email = new \Buzz\Control\Objects\Email();
$email->setIdentifier('bbf16-exhibitor');

$mailer = new \Buzz\Control\Objects\Mailer();
$mailer->setEmail($email);
$mailer->setCustomer(new \Buzz\Control\Objects\Customer(6));

$service  = new \Buzz\Control\Services\MailerService($buzz);
$response = $service->send($mailer);

var_dump($response);
