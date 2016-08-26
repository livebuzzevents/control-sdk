<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\TopicService($buzz);

$topic = new \Buzz\Control\Objects\Topic;
$topic->setCampaignId('dcff6aff-50e1-449f-8d4c-9a18421d0000');
$topic->setName('sdk test');
$topic->setIdentifier('sdk_test');
$topic->setDescription('test description');

$topic = $service->save($topic);
var_dump($topic);

$topic->setName('sdk test 2');

$topic = $service->save($topic);
var_dump($topic);

$topic = $service->delete($topic);
var_dump($topic);
