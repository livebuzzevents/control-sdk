<?php

require_once '../bootstrap.php';

$exhibitorService = new \Buzz\Control\Services\ExhibitorService($buzz);

$socialService = new \Buzz\Control\Services\SocialService($buzz);

$stream = (new \Buzz\Control\Services\StreamService($buzz))
    ->where('identifier', 'is', 'visitor')
    ->getOne();

$buzz->setStream($stream->id);

$outputBuffer = fopen("php://output", 'w');

fputcsv($outputBuffer, [
    'exhibitor_id'        => 'Exhibitor Id',
    'exhibitor_source_id' => 'Exhibitor Source Id',
    'exhibitor_name'      => 'Exhibitor Name',
    'url'                 => 'URL',
]);

$exhibitorService
    ->with(['mainContact'])
    ->where('mainContact', 'has')
    ->chunk(50, function ($exhibitors) use ($socialService, $buzz, $stream, $outputBuffer) {
        /** @var \Buzz\Control\Objects\Exhibitor $exhibitor */
        foreach ($exhibitors as $exhibitor) {
            $buzz->setCustomerFlow(new \Buzz\Control\CustomerFlow($exhibitor->getMainContact()));

            // all providers: ['facebook', 'twitter', 'linkedin', 'website', 'email']
            foreach (['email'] as $provider) {
                $invite = new \Buzz\Control\Objects\Invite([
                    'status'                  => 'sent',
                    'provider'                => $provider,
                    'created_by_exhibitor_id' => $exhibitor->getId(),
                ]);
                $invite->setStream($stream);

                fputcsv($outputBuffer, [
                    'exhibitor_id'        => $exhibitor->getId(),
                    'exhibitor_source_id' => $exhibitor->getSourceId(),
                    'exhibitor_name'      => $exhibitor->getName(),
                    'url'                 => $socialService->inviteShare($invite)->getUrl(),
                ]);
            }
        }
    });

fclose($outputBuffer);
