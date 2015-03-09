<?php

require_once '../../bootstrap.php';

$user      = new \Buzz\Control\Objects\User(1);
$parameter = new \Buzz\Control\Objects\Parameter(1);

$userParameter = new \Buzz\Control\Objects\User\Parameter();
$userParameter->setParameter($parameter);
$userParameter->setValue('123qwe');

$service  = new \Buzz\Control\Services\User\Parameter\Create($user, $userParameter);
$response = $serviceHandler->execute($service);

var_dump($response);