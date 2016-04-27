<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\ProductService($buzz);
$response = $service->getMany();

dd($response);