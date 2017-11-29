<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\QuestionOptionService($buzz);

dd($service->getMany());
