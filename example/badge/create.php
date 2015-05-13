<?php

require_once '../bootstrap.php';

$badgeType = new \Buzz\Control\Objects\BadgeType(1);
$customer  = new \Buzz\Control\Objects\Customer(191);

$badge = new \Buzz\Control\Objects\Badge();
$badge->setBadgeTypeId(1);
$badge->setCustomerId(191);
$badge->setBarcode('1234567890');

//SCAN
$scan = new \Buzz\Control\Objects\Scan();
$scan->setScannerId(1);
$scan->setCreatedAt(new DateTime("2012-07-08 11:14:15.889342"));
$badge->addScan($scan);
//END SCAN

$service  = new \Buzz\Control\Services\Badge\Create($badge);
$response = $serviceHandler->execute($service);

echo '<pre>';
var_dump($response);
echo '</pre>';