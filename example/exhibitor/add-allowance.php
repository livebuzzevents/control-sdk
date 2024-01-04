<?php

use Buzz\Control\Campaign\Allowance;
use Buzz\Control\Campaign\Exhibitor;
use Buzz\Control\Filter;

require_once '../bootstrap.php';

$exhibitorBadgeType = '1a2a19f4-4267-11ee-993a-000000000000';
$filter             = (new Filter())
    ->add('allowances', 'has not', [['refines.filters', 'contains', $exhibitorBadgeType]])
    ->add('status', 'is not', 'cancelled');
$exhibitors         = collect();
$page               = 1;

while (true) {
    $getExhibitors = (new Exhibitor())->get($filter, $page, 100);

    if ($getExhibitors->isEmpty()) {
        break;
    }

    $exhibitors = $exhibitors->merge($getExhibitors);

    $page++;
}

foreach ($exhibitors as $exhibitor) {
    $allowance = new Allowance();

    $allowance->entitlement = 'BadgeType';
    $allowance->refines     = [
        [
            'field'   => 'entitlement',
            'filters' => [['id', 'is', $exhibitorBadgeType]],
        ],
    ];
    $allowance->amount      = null;

    $allowance->associate($exhibitor);
    $allowance->save();

    echo "Adding allowance to $exhibitor->name\n";
}
