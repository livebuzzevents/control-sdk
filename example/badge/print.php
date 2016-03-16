<?php

require_once '../bootstrap.php';

set_time_limit(0);

$service = new \Buzz\Control\Services\BadgeService($buzz);

$companies = [
    'fresh',
    'The Hollywood Special Effects Show',
    'Gastronaut',
    'MARS (Gastronaut)',
    'LiveBuzz',
];

$badges = $service->where('campaign.identifier', 'is', 'bbf16')
    ->where('badgeType.identifier', 'is', 'crew')
    ->where('customer.jobs.company', 'is', $companies[4])
    ->perPage(1000)
    ->getMany();

dd($badges->toArray());

foreach ($badges as $key => $badge) {
    $service->smartPrint($badge, [
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