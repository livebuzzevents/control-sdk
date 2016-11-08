<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\TopicService($buzz);

$topic = new \Buzz\Control\Objects\Topic;
$topic->setName('sdk test');
$topic->setIdentifier('sdk_test');
$topic->setDescription('test description');

$topic = $service->save($topic);
dump($topic);

$topic->setName('sdk test 2');

$topic = $service->save($topic);
dump($topic);

$topic = $service->delete($topic);
dump($topic);
