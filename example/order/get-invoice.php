<?php

require_once '../bootstrap.php';

$order = new \Buzz\Control\Objects\Order('399cd532-c228-4f9f-a73e-8d659e7f0000');

$service = new \Buzz\Control\Services\OrderService($buzz);

$pdf = $service->getInvoice($order);

dd($pdf);
