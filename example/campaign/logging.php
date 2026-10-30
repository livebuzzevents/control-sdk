<?php

require_once '../bootstrap.php';

$clarionOrganizations = [
    'clarion-events',
    'clarion-defence-and-security',
    'clarion-events-inc-north-america',
    'imago-tech',
    'phacilitate',
];

foreach ($clarionOrganizations as $clarionOrganization) {
    $page    = 1;
    $perPage = 100;

    \Buzz\Control\Service::setOrganization($clarionOrganization);

    $campaigns = [];

    while (true) {
        $campaignChunk = (new \Buzz\Control\Organization\Campaign)->get(null, $page, $perPage);

        foreach ($campaignChunk as $campaign) {
            $campaigns[] = $campaign;
        }

        if (count($campaignChunk) < $perPage) {
            break;
        }

        $page++;

        sleep(1);
    }

    foreach ($campaigns as $campaign) {
        \Buzz\Control\Service::setCampaign($campaign->identifier);

        if (strpos($campaign->name, '2022') !== false) {
            continue;
        }

        if (strpos($campaign->name, '2023') !== false) {
            continue;
        }

        if (strpos($campaign->name, '2024') !== false) {
            continue;
        }

        $hasLoggingDriverEnabled = false;

        echo $clarionOrganization.' '.$campaign->name.' ';

        $integrationProviders = (new \Buzz\Control\Campaign\IntegrationProvider)->get(null, 1, 100);

        foreach ($integrationProviders as $integrationProvider) {
            if ($integrationProvider->provider === 'clarion' && $integrationProvider->active === true) {
                $hasLoggingDriverEnabled = true;
            }
        }

        if ($hasLoggingDriverEnabled) {
            echo '✅';
        } else {
            echo '❌';
        }

        echo PHP_EOL;

        sleep(1);
    }
}
