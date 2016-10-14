<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\StreamService($buzz);

$streams = $service->getMany();

dd($streams);
