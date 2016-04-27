<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer('9a82ed37-7fcf-44ce-883c-75b982d00000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$basket = $service->create($customer, [
    'destination' => 'system',
]);

dd($basket);