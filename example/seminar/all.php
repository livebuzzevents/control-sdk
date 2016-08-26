<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\SeminarService($buzz);

$seminars = $service->getMany();

dd($seminars);
