<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\QuestionService();

$questions = $service->perPage(3)->page(2)->where('active', 'is', 'yes')->getMany();

var_dump($questions);