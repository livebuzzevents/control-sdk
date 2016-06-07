<?php

use \Buzz\Control\Objects;

require_once '../bootstrap.php';

$badgeType = new Objects\BadgeType('3f5c20c4-123a-482e-ad10-fac9a0560000');
$campaign = new Objects\Campaign('dcff6aff-50e1-449f-8d4c-9a18421d0000');

$users = [
    [
        'first_name' => 'test',
        'last_name' => 'test',
        'email' => 'test@gmail.com',
        'company' => 'test',
    ],
    [
        'first_name' => 'test2',
        'last_name' => 'test2',
        'email' => 'test2@gmail.com',
        'company' => 'test2',
    ]
];

foreach ($users as $user) {
    $customers = (new \Buzz\Control\Services\CustomerService($buzz))
        ->where('first_name', 'is', $user['first_name'])
        ->where('last_name', 'is', $user['last_name'])
        ->where('badges.badge_type_id', 'is', $badgeType->getId())
        ->getMany();

    if(!$customers->isEmpty()) {
        continue;
    }

    $customer = new Objects\Customer();

    $customer->setCampaignId($campaign->getId());
    $customer->setFirstName($user['first_name']);
    $customer->setLastName($user['last_name']);
    $customer->setEmail($user['email']);
    $customer->setStatus('a2ctive');

    $job = new \Buzz\Control\Objects\Customer\Job();
    $job->setCompany($user['company']);

    $customer->addJob($job);

    $badge = new Objects\Badge();
    $badge->setCampaignId($campaign->getId());
    $badge->setBadgeTypeId($badgeType->getId());
    $badge->setStatus('active');

    $customer->addBadge($badge);

    var_dump($user);

    // (new \Buzz\Control\Services\CustomerService($buzz))->save($customer);
}
