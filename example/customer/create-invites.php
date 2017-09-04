<?php

require_once '../bootstrap.php';

$customerService = new \Buzz\Control\Services\CustomerService($buzz);

$socialService = new \Buzz\Control\Services\SocialService($buzz);

$stream = (new \Buzz\Control\Services\StreamService($buzz))
    ->where('identifier', 'is', 'visitor')
    ->getOne();

$buzz->setStream($stream->id);

$customerService
    ->where('tags.tag.name', 'is', 'influencer')
    ->chunk(15, function ($customers) use ($socialService, $buzz, $stream) {
        foreach ($customers as $customer) {
            $buzz->setCustomerFlow(new \Buzz\Control\CustomerFlow($customer));

            $invite = new \Buzz\Control\Objects\Invite([
                'status'   => 'sent',
                'provider' => 'email',
            ]);
            $invite->setStream($stream);

            $socialService->inviteShare($invite);
        }
    });
