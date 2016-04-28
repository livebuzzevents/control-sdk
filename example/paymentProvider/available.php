<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');
$order  = new \Buzz\Control\Objects\Order('d61dedb3-9803-4d54-9fc3-5b6050360000');

$service = new \Buzz\Control\Services\PaymentProviderService($buzz);

//$basket = $service->setPaymentProvider($basket, $paymentProvider);
//$basket = $service->unsetPaymentProvider($basket);

//$paymentProviders = $service->getAvailableForBasket($basket);
$paymentProviders = $service->getAvailableForOrder($order);

//$service->getAvailableForOrder();

dd($paymentProviders);