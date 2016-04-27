<?php

require_once '../bootstrap.php';

$basket  = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');
$product = new \Buzz\Control\Objects\Product('eb7366f7-1981-4281-9120-16c1fe330000');
//$product = new \Buzz\Control\Objects\Product('5e959255-c4df-4598-a8ab-5ef85ef40000');

$service = new \Buzz\Control\Services\BasketService($buzz);

//$basket = $service->addProduct($basket, $product);
//$basket = $service->addProduct($basket, $product, 5);
//$basket = $service->updateProduct($basket, $product, 2);
//$basket = $service->removeProduct($basket, $product);
//$basket = $service->removeProducts($basket);
//$basket = $service->reset($basket);
//$basket = $service->updateProducts($basket, [
//    'eb7366f7-1981-4281-9120-16c1fe330000' => 3,
//    '5e959255-c4df-4598-a8ab-5ef85ef40000' => 2,
//]);

//dd($basket);