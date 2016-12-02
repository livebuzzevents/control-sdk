<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\StreamPageActivityService($buzz);

$streamPageActivity = new \Buzz\Control\Objects\StreamPageActivity();
$streamPageActivity->setCustomerId('dea38b14-94f7-4ece-bcdc-8d1b52050000');
$streamPageActivity->setExhibitorId('38ea46b0-136c-429a-a753-c02c60400000');
$streamPageActivity->setStreamMenuItemId('ccb162da-958c-4280-b217-c9bf78900000');
$streamPageActivity->setAction('viewed');

$streamPageActivity = $service->save($streamPageActivity);
dump($streamPageActivity);

$streamPageActivity->setAction('submitted');

$streamPageActivity = $service->save($streamPageActivity);
dump($streamPageActivity);

$streamPageActivity = $service->delete($streamPageActivity);
dump($streamPageActivity);
