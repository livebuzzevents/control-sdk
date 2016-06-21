<?php

require_once '../bootstrap.php';

set_time_limit(0);

$printer = new \Buzz\Control\Objects\Printer();
$printer->setId(2);

$page    = 0;
$printed = 0;

$skip_till_exhibitor = 'Dalston Cola';
$skip_found          = true;

if ($skip_till_exhibitor) {
    $skip_found = false;
}

while (true) {
    $page++;

    $exhibitors = (new \Buzz\Control\Services\ExhibitorService($buzz))
        ->where('campaign.identifier', 'is', $campaign->getIdentifier())
        ->where('badges', 'has')
        ->perPage(10)
        ->order('name')
        ->direction('asc')
        ->page($page)
        ->getMany();

    foreach ($exhibitors as $exhibitor) {

        if (!$skip_found) {
            if ($exhibitor->name == $skip_till_exhibitor) {
                $skip_found = true;
            }
        }

        if (!$skip_found) {
            print 'Skipping Exhibitor: #' . $exhibitor->getId() . ' - ' . $exhibitor->getName() . PHP_EOL;
            continue;
        }

        $badges = (new \Buzz\Control\Services\BadgeService($buzz))
            ->where('exhibitor_id', 'is', $exhibitor->getId())
//            ->where('prints', 'has not')
            ->where('status', 'is', 'active')
            ->where('customer', 'has')
            ->with('customer')
            ->perPage(500)
            ->getMany();

        if ($badges->isEmpty()) {
            continue;
        }

        $badges = $badges->sort(function ($a, $b) {
            return strtolower($a->customer->last_name) > strtolower($b->customer->last_name);
        });

        while (true) {
            try {
                (new \Buzz\Control\Services\BadgeService($buzz))->printSeparator(
                    $printer,
                    ['text' => $exhibitor->getName()]
                );
                print 'Printing Exhibitor: #' . $exhibitor->getId() . ' - ' . $exhibitor->getName() . PHP_EOL;
                break;
            } catch (\Exception $e) {
                print $e->getMessage() . PHP_EOL;
                print 'Retrying...' . PHP_EOL;
                usleep(200000);
            }
        }

        foreach ($badges as $badge) {
            while (true) {
                try {
                    (new \Buzz\Control\Services\BadgeService($buzz))->print(
                        $badge,
                        $printer
                    );
                    print 'Printed: ' . $badge->id . ' | ' . $badge->customer->last_name . PHP_EOL;
                    break;
                } catch (\Exception $e) {
                    print $e->getMessage() . PHP_EOL;
                    print 'Retrying...' . PHP_EOL;
                    usleep(200000);
                }
            }

            usleep(200000);

            $printed++;
        }
    }

    if ($exhibitors->isLastPage()) {
        break;
    }
}

print "PRINTED : " . $printed . PHP_EOL;