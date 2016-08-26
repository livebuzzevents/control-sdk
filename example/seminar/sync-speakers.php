<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\SeminarService($buzz);

$seminar = new \Buzz\Control\Objects\Seminar('eca97d62-63ac-4e70-a1fe-da22fb790011');
$customers[] = new \Buzz\Control\Objects\Customer('0b6050e2-a530-4934-a3ee-e9691de70000');
$customers[] = new \Buzz\Control\Objects\Customer('28b13a33-4822-4f5c-839b-e740aab20000');

$seminars = $service->syncSpeakers($seminar, $customers);

dd($seminars);
