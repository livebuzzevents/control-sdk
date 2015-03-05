<?php

require_once '../bootstrap.php';

$question = new \Buzz\Control\Objects\Question(1);

$service  = new \Buzz\Control\Services\Question\Get($question);
$response = $serviceHandler->execute($service);

var_dump($response);