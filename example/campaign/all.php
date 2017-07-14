<?php

require_once '../bootstrap.php';

$service  = new \Buzz\Control\Services\CampaignService($buzz);
$response = $service->getMany();

dd($response);
