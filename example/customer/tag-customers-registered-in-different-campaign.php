<?php

require_once '../bootstrap.php';

// the campaign to check for the customer in
$comparisonCampaign = 'ppma-show';

$previousTag = 'prepop-07-09';
$nextTag     = 'prepop-12-09';

// =============================================================
$comparisonCredentials = clone $credentials;
$comparisonCredentials->setCampaign($comparisonCampaign);

$comparisonBuzz = new \Buzz\Control\Buzz();
$comparisonBuzz->setCredentials($comparisonCredentials);

$customerService           = new \Buzz\Control\Services\CustomerService($buzz);
$comparisonCustomerService = new \Buzz\Control\Services\CustomerService($comparisonBuzz);

$page = 1;

while (true) {
    $customers = $customerService
        ->where('tags.tag.name', 'is', $previousTag)
        ->with(['tags.tag'])
        ->page($page)
        ->perPage(50)
        ->getMany();

    if (!$customers->count()) {
        break;
    }

    foreach ($customers as $customer) {
        $alreadyTagged = !$customer->getTags()->filter(function ($customerTag) use ($nextTag) {
            return $customerTag->tag->name === $nextTag;
        })->isEmpty();

        if ($alreadyTagged) {
            echo "Not registered. Already tagged - " . $customer->getEmail() . " - $page\n";
            continue;
        }

        $comparisonCustomer = $comparisonCustomerService->where('email', 'is', $customer->getEmail())->getOne();
        if ($comparisonCustomer) {
            echo "Already registered - " . $customer->getEmail() . " - $page\n";
        } else {
            $customerService->tag($customer, $nextTag);
            echo "Not registered. Tagging for this email shot - " . $customer->getEmail() . " - $page\n";
        }
    }

    $page++;
}

echo "Finished!";
