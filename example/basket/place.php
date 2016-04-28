<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('c8888be0-975d-44bd-890d-15c92dfe0000');

$service = new \Buzz\Control\Services\BasketService($buzz);

$order = $service->place($basket);

dd($order);