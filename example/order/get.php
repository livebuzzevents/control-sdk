<?php

require_once '../bootstrap.php';

$order = new \Buzz\Control\Objects\Order('db8c5b6b-a6b8-4b08-91c3-b07cc27a0000');

$service = new \Buzz\Control\Services\OrderService($buzz);

$order = $service->get($order);

dd($order);
