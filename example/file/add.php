<?php

require_once '../bootstrap.php';

$campaign = (new \Buzz\Control\Services\CampaignService($buzz))
    ->where('identifier', 'is', $campaign)
    ->getMany()->first();

$service  = new \Buzz\Control\Services\FileService($buzz);
$response = $service->add('campaign', $campaign->id, 'somefile.txt', 'Example text content I am');

var_dump($response);
