<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$generated = $service->generate($basket);

dd($generated);