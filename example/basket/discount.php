<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$basket = $service->setDiscountCode($basket, 'discount_code');
//$basket = $service->unsetDiscountCode($basket);

dd($basket);