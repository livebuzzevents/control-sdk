<?php

require_once '../../bootstrap.php';

$channel = new \Buzz\Control\Objects\Channel();

$channel->setId(1);

$service  = new \Buzz\Control\Services\Channel\Product\All($channel);
$response = $serviceHandler->execute($service);

var_dump($response);