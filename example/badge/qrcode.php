<?php

require_once '../bootstrap.php';

$badge = new \Buzz\Control\Objects\Badge('93666753-e348-4d1a-bdb4-86448fcf0000');

$service = new \Buzz\Control\Services\BadgeService($buzz);

$image = $service->getQrCodeImage($badge, 125);

echo '<pre>';
echo '<img src="' . $image . '" />';
echo '</pre>';