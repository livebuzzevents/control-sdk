<?php

require_once '../bootstrap.php';

$product = new \Buzz\Control\Objects\Product('b9565fc2-b84d-42a2-8220-f42302e90000');
$basket  = new \Buzz\Control\Objects\Basket('a372bd10-d425-4a7d-ad39-9afac9b60011');

$service = new \Buzz\Control\Services\BasketService($buzz);

$basket = $service->reset($basket);

dump($basket);

$basket = $service->addProduct($basket, $product);
$basket = $service->addProduct($basket, $product, 2);

dump($basket);

$basket = $service->addAction($basket, $product, 'SetCustomerBadgeType', [
    'customer_id' => '0b6050e2-a530-4934-a3ee-e9691de70000',
    'identifier'  => 'speaker',
]);

dump($basket);

$basket = $service->updateActions($basket, $product, [
    [
        'name'       => 'SetCustomerBadgeType',
        'parameters' => [
            'customer_id' => '0b6050e2-a530-4934-a3ee-e9691de70000',
            'identifier'  => 'speaker',
        ],
    ],
]);

dump($basket);

$basket = $service->removeActions($basket, $product);

dump($basket);
