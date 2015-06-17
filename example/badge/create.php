<?php

require_once '../bootstrap.php';

$campaign = new \Buzz\Control\Objects\Campaign(1);
$customer = new \Buzz\Control\Objects\Customer(191);

$badge = new \Buzz\Control\Objects\Badge();
$badge->setBadgeTypeId(1);
$badge->setCustomerId(1);
$badge->setOverride([
    'customer_first_name'  => 'Jordan',
    'customer_middle_name' => 'Todorov',
    'customer_last_name'   => 'Dobrev',
    'job_company'          => 'LiveBuzz',
    'job_title'            => 'Web developer',
    'badge_type_name'      => 'LiveBuzz VIP',
]);
//$badge->setBarcode('1234567890');

////SCAN
//$scan = new \Buzz\Control\Objects\Scan();
//$scan->setScannerId(1);
//$scan->setCreatedAt(new DateTime("2012-07-08 11:14:15.889342"));
//$badge->addScan($scan);
////END SCAN

$service  = new \Buzz\Control\Services\Badge\Create($campaign, $badge);
$response = $serviceHandler->execute($service);

echo '<pre>';
var_dump($response);
echo '</pre>';