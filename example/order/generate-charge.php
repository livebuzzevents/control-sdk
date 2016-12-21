<?php

require_once '../bootstrap.php';

$order = new \Buzz\Control\Objects\Order('bd2dccea-0653-4b48-9349-e7d32acb0000');

$paymentProvider = new \Buzz\Control\Objects\PaymentProvider('5ae33d9a-057a-4bad-bb51-002153d80000');

$service = new \Buzz\Control\Services\Order\PaymentService($buzz);

$service->generate($order, $paymentProvider);
