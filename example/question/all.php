<?php

require_once '../bootstrap.php';

$filter = new \Buzz\Control\Objects\Filter();
$filter->add('id', 'in', [1, 2]);

$service  = new \Buzz\Control\Services\Question\All($filter);
$response = $serviceHandler->execute($service);

var_dump($response);