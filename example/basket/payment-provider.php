<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$paymentProvider = new \Buzz\Control\Objects\PaymentProvider('4dda85c4-d9b9-47f7-bf9c-6757eea40000');

$basket = $service->setPaymentProvider($basket, $paymentProvider);
//$basket = $service->unsetPaymentProvider($basket);

dd($basket);