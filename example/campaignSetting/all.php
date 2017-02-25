<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\CampaignSettingService($buzz);
$response = $service->getMany();

dd($response);
