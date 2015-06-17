<?php

require_once '../bootstrap.php';

$badge = new \Buzz\Control\Objects\Badge(1);

$service  = new \Buzz\Control\Services\Badge\Get($badge);
$response = $serviceHandler->execute($service);

echo '<pre>';
var_dump($response);
echo '</pre>';