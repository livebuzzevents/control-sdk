<?php

require_once '../bootstrap.php';

$order = new \Buzz\Control\Objects\Order('db8c5b6b-a6b8-4b08-91c3-b07cc27a0000');

$service = new \Buzz\Control\Services\OrderService($buzz);

$link = $service->getCheckoutLink($order, [
    'success_url' => 'http://dada.bg/?success',
    'cancel_url'  => 'http://dada.bg/?cancel',
]);

dd($link);
