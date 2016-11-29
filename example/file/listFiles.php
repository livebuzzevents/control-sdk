<?php

require_once '../bootstrap.php';

$campaign = (new \Buzz\Control\Services\CampaignService($buzz))
    ->where('identifier', 'is', $campaign)
    ->getMany()->first();

$service  = new \Buzz\Control\Services\FileService($buzz);
$response = $service->listFiles('campaign', $campaign->id);

var_dump($response);
