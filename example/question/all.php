<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\QuestionService($buzz);
$response = $service->getMany();

var_dump($response);