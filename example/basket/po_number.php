<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('39a35f47-99fa-4767-93db-3c4920fa0000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$order = $service->setPoNumber($basket, '123qwe');

dd($order);