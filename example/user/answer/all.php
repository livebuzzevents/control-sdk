<?php

require_once '../../bootstrap.php';

$user     = new \Buzz\Control\Objects\User(1);
$campaign = new \Buzz\Control\Objects\Campaign(1);

$service  = new \Buzz\Control\Services\User\Answer\All($user, $campaign);
$response = $serviceHandler->execute($service);

var_dump($response);