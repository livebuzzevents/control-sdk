<?php

require_once '../bootstrap.php';

$file = new \Buzz\Control\Objects\File('ce1368d5-22fb-4844-b3f8-7e1e02f30000');

$service  = new \Buzz\Control\Services\FileService($buzz);
$response = $service->download($file);

var_dump($response);
