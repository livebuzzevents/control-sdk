<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\SeminarService($buzz);

$seminar = new \Buzz\Control\Objects\Seminar('eca97d62-63ac-4e70-a1fe-da22fb790011');
$topic = new \Buzz\Control\Objects\Topic('b5ef80fb-822b-4893-aac6-ede09b590011');

$seminars = $service->attachTopic($seminar, $topic);

dd($seminars);
