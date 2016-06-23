<?php

require_once '../bootstrap.php';

set_time_limit(0);

$printer = new \Buzz\Control\Objects\Printer();
$printer->setId(3);

$skip_till  = '';
$skip_found = true;

if ($skip_till) {
    $skip_found = false;
}

$badges = (new \Buzz\Control\Services\BadgeService($buzz))
    ->where('campaign.identifier', 'is', $campaign->getIdentifier())
    ->where('badgeType.identifier', 'is', 'visitor')
    ->where('customer.addresses', 'has')
    ->where('prints', 'has not')
    ->where('status', 'is', 'active')
    ->where('customer.last_name', 'starts with', 'O')
    ->where('customer', 'has')
    ->with('customer')
    ->perPage(5000)
    ->getMany();

dd($badges->getTotal());

$badges = $badges->sort(function ($a, $b) {
    return strtolower($a->customer->last_name) > strtolower($b->customer->last_name);
});

$printed = 0;

foreach ($badges as $badge) {
    if (!$skip_found) {
        if ($badge->customer->last_name == $skip_till) {
            $skip_found = true;
        }
    }

    if (!$skip_found) {
        continue;
    }

    while (true) {
        try {
            (new \Buzz\Control\Services\BadgeService($buzz))->print(
                $badge,
                $printer
            );
            print 'Printed: ' . $badge->id . ' | ' . $badge->customer->last_name . PHP_EOL;
            $printed++;
            break;
        } catch (\Exception $e) {
            print $e->getMessage() . PHP_EOL;
            print 'Retrying...' . PHP_EOL;
            usleep(200000);
        }
    }

    usleep(200000);
}

print "PRINTED : " . $printed . PHP_EOL;