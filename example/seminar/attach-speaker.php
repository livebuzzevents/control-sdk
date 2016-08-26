<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\SeminarService($buzz);

$seminar = new \Buzz\Control\Objects\Seminar('eca97d62-63ac-4e70-a1fe-da22fb790011');
$customer = new \Buzz\Control\Objects\Customer('c12b1abd-a376-4842-9abc-683fd2840000');

$seminars = $service->attachSpeaker($seminar, $customer);

dd($seminars);
