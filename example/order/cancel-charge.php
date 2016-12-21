<?php

require_once '../bootstrap.php';

$order = new \Buzz\Control\Objects\Order('bd2dccea-0653-4b48-9349-e7d32acb0000');

$service = new \Buzz\Control\Services\OrderService($buzz);

$order = $service->with('charges')->get($order);

$service = new \Buzz\Control\Services\Order\PaymentService($buzz);

if ($order->getCharges()) {
    $service->cancel($order, $order->getCharges()->where('status', 'pending')->first());
}
