<?php

require_once '../bootstrap.php';

$badge = new \Buzz\Control\Objects\Badge('93666753-e348-4d1a-bdb4-86448fcf0000');

$service = new \Buzz\Control\Services\BadgeService($buzz);

$image = $service->getBarcodeImage($badge, 1, 30);

echo '<pre>';
echo '<img src="' . $image . '" />';
echo '</pre>';