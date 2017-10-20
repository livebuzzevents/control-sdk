<?php

require_once '../bootstrap.php';

/*
 * Tags customers in previous campaigns that have not registered in the current campaign.
 * If they're registered in more than one old campaign, the most recent is tagged.
 */

// 1) Set credentials and organization in config.php
// 2) Specify campaign identifiers in ascending order - oldest to newest
$campaigns = [
    'freigh15',
    'freigh16',
    '2017',
];

// 3) Specify previous tag if applicable to limit scope and finish quicker
$previousTag = null;

// 4) Specify the tag you want to add
$nextTag = 'prepop-20-10';

// 5) Run this script from a shell!

// =============================================================
$campaignCredentials = $campaignBuzz = $campaignCustomerService = [];
foreach ($campaigns as $campaign) {
    $campaignCredentials[$campaign] = clone $credentials;
    $campaignCredentials[$campaign]->setCampaign($campaign);

    $campaignBuzz[$campaign] = new \Buzz\Control\Buzz();
    $campaignBuzz[$campaign]->setCredentials($campaignCredentials[$campaign]);

    $campaignCustomerService[$campaign] = new \Buzz\Control\Services\CustomerService($campaignBuzz[$campaign]);
}

function lineSuffix($campaign, $customers, $customer, $customerNumber)
{
    global $campaigns;

    return sprintf(" | Campaign %s of %s - Page %s of %s - Customer %s of %s [%s]\n",
        array_search($campaign, $campaigns) + 1,
        count($campaigns) - 1,
        $customers->getPage(),
        $customers->getLastPage(),
        $customerNumber,
        $customers->getTotal(),
        $customer->getEmail()
    );
}

foreach (array_slice($campaigns, 0, -1) as $campaign) {
    $customerService    = $campaignCustomerService[$campaign];
    $campaignsToCompare = array_slice($campaigns, array_search($campaign, $campaigns) + 1);

    $page           = 1;
    $customerNumber = 1;

    while (true) {
        $customers = $previousTag ? $customerService->where('tags.tag.name', 'is', $previousTag) : $customerService;
        $customers = $customers
            ->where('email', 'is not null')
            ->with(['tags.tag'])
            ->page($page)
            ->perPage(50)
            ->getMany();

        if (!$customers->count()) {
            break;
        }

        foreach ($customers as $customer) {
            $lineSuffix = lineSuffix($campaign, $customers, $customer, $customerNumber++);

            $alreadyTagged = !$customer->getTags()->filter(function ($customerTag) use ($nextTag) {
                return $customerTag->tag->name === $nextTag;
            })->isEmpty();

            if ($alreadyTagged) {
                echo "Not Registered. Already Has Tag     " . $lineSuffix;
                continue;
            }

            $alreadyRegistered = false;
            foreach ($campaignsToCompare as $campaignToCompare) {
                $newerCustomer = $campaignCustomerService[$campaignToCompare]
                    ->where('email', 'is', $customer->getEmail())->getOne();

                if ($newerCustomer) {
                    $alreadyRegistered = true;
                    echo "Already Registered in Later Campaign" . $lineSuffix;

                    break;
                }
            }

            if (!$alreadyRegistered) {
                $customerService->tag($customer, $nextTag);
                echo "Not Registered. Adding Tag          " . $lineSuffix;
            }
        }

        $page++;
    }

    echo "Finished $campaign!\n\n";
}

echo "Finished!";
