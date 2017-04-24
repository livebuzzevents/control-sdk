<?php

use Buzz\Control\Objects\Scanner;
use Buzz\Control\Services\ExhibitorService;
use Buzz\Control\Services\ScannerService;

require_once '../bootstrap.php';

$service = new ExhibitorService($buzz);

$exhibitors = $service->where('scanners', 'has not', [
    ['type', 'is', 'handiscan'],
    ['order_product_id', 'is null'],
])->perPage(5000)->getMany();

$batch = [];

foreach ($exhibitors as $exhibitor) {
    $scanner = new Scanner();

    $scanner->setType('handiscan');
    $scanner->setPaid('yes');
    $scanner->setExhibitorId($exhibitor->id);
    $scanner->setPurpose('exhibitor');

    $batch[] = $scanner;
}

$scannerService = new ScannerService($buzz);

$chunks = array_chunk($batch, 50);

foreach ($chunks as $chunk) {
    $scannerService->saveMany($chunk);
}

dd('done!');
