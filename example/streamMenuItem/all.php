<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\StreamMenuItemService($buzz);

$streamMenuItems = $service->getMany();

dd($streamMenuItems);
