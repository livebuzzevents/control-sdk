<?php

require_once '../bootstrap.php';

$question = new \Buzz\Control\Objects\Question(1);

$service  = new \Buzz\Control\Services\QuestionService($buzz);
$response = $service->get($question);

var_dump($response);