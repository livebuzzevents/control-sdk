<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\TopicService($buzz);

$topic = $service->getMany();

dd($topic);
