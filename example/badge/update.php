<?php

require_once '../bootstrap.php';

$badge = new \Buzz\Control\Objects\Badge();
$badge->setBadgeTypeId(1);
$badge->setCustomerId(191);
$badge->setBarcode('1234567890');

$service  = new \Buzz\Control\Services\Badge\Save($badge);
$response = $serviceHandler->execute($service);

echo '<pre>';
var_dump($response);
echo '</pre>';