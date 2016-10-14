<?php

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\StreamService($buzz);

$stream = $service
    ->where('campaign.identifier', 'is', $campaignIdentifier)
    ->where('identifier', 'is', 'visitor')
    ->getMany()->first();

dd($stream);
