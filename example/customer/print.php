<?php

require_once '../bootstrap.php';

set_time_limit(0);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$companies = [
    'fresh',
    'The Hollywood Special Effects Show',
    'Gastronaut',
    'MARS (Gastronaut)',
    'LiveBuzz',
];

$customers = $service->where('campaign.identifier', 'is', 'bbf16')
    ->where('badgeType.identifier', 'is', 'crew')
    ->where('customer.jobs.company', 'is', $companies[4])
    ->perPage(1000)
    ->getMany();

dd($customers->toArray());

foreach ($customers as $key => $customer) {
    $service->smartPrint($customer, [
        '3d44b10b-a9a5-4270-b178-6005354e0000' => [
            ['id' => 1, 'priority' => 1],
        ],
    ]);

    // 0.5 seconds
    usleep(2000000);
}

echo '<pre>';
//var_dump($response);
echo '</pre>';
