<?php

use Buzz\Control\Objects\Customer;

require_once '../bootstrap.php';

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customers = $service->where('attended', 'is', 'yes')->perPage(5000)->getMany();

$batch = [];

foreach ($customers as $customer) {
    $updated = (new Customer($customer->id));
    $updated->setAttended('no');

    $batch[] = $updated;
}

$chunks = array_chunk($batch, 50);

foreach ($chunks as $chunk) {
    $service->saveMany($chunk);
}

dd('done!');
