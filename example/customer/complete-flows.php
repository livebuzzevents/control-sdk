<?php

require_once '../bootstrap.php';

$customerService = new \Buzz\Control\Services\CustomerService($buzz);

$flowService = new \Buzz\Control\Services\Customer\FlowService($buzz);

$stream = (new \Buzz\Control\Services\StreamService($buzz))
    ->where('identifier', 'is', 'visitor')
    ->getOne();

$buzz->setStream($stream->id);

$customerService
    ->where('id', 'in', [
        'd97e33e3-c26a-4c9e-89ba-73452a7f0000',
        '17b4e097-1f5e-489e-a9d9-e58533c00000',
    ])
    ->chunk(15, function ($customers) use ($flowService, $buzz, $stream) {
        foreach ($customers as $customer) {
            $flowService->complete($customer);
        }
    });
