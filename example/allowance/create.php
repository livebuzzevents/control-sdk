<?php

use Buzz\Control\Campaign\Allowance;
use Buzz\Control\Campaign\Exhibitor;

require_once '../bootstrap.php';

$exhibitors = collect();
$page = 1;
$counter = 1;
$badgeType = '800e4e8a-3567-11f0-83f5-000000000000';

while (true) {
    $getExhibitors = (new Exhibitor())->get([
        ['status', 'is not', 'cancelled'],
        ['allowances', 'has not', [['refines.filters', 'contains', $badgeType]]]
    ], $page, 25);

    if ($getExhibitors->isEmpty()) {
        break;
    }

    $exhibitors = $exhibitors->merge($getExhibitors);
    $page++;
}

$total = $exhibitors->count();

foreach ($exhibitors as $exhibitor) {
    echo "[$counter of $total] Added badge type allowance to $exhibitor->name ($exhibitor->id) \n";

    $allowance = new Allowance();

    $allowance->entitlement = 'BadgeType';
    $allowance->refines = [['field' => 'entitlement', 'filters' => [['id', 'is', $badgeType]]]];
    $allowance->amount = 50; // null for unlimited

    $allowance->associate($exhibitor);

    $allowance->save();

    $counter++;
}