<?php

require_once '../../bootstrap.php';

$user = new \Buzz\Control\Objects\User(3);

$service  = new \Buzz\Control\Services\User\Phone\All($user);
$response = $serviceHandler->execute($service);

var_dump($response);