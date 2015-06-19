<?php

require_once '../bootstrap.php';

$badge = new \Buzz\Control\Objects\Badge(1);

$badge = $badge->createFromArray([
    'id'        => 1,
    'customer'  => ['id' => '1'],
    'scans'     => [['id' => '1']],
    'badgeType' => ['id' => '1'],
    'exhibitor' => ['id' => '1'],
]);

dd($badge);
///
exit();

$badge = new \Buzz\Control\Objects\Badge(1);

$service  = new \Buzz\Control\Services\Badge\Get($badge);
$response = $serviceHandler->execute($service);

echo '<pre>';
var_dump($response);
echo '</pre>';