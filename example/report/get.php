<?php

require_once '../bootstrap.php';

$report = new \Buzz\Control\Objects\Report();

$report->setData([
    'charts' =>
        [
            [
                'name'    => 'Heard from',
                'formula' => '#1',
                'format'  => 'number',
                'facts'   =>
                    [
                        [
                            'fact'    => 'customerAnswerOption.records',
                            'filters' =>
                                [
                                    [
                                        'parameter' => 'questionOption.question.id',
                                        'operator'  => 'is',
                                        'value'     => 'cacb1f0c-af37-497f-9637-2c48d6820000',
                                    ],
                                    [
                                        'parameter' => 'customerAnswer.customer.badges.scans.scanner.exhibitor_id',
                                        'operator'  => 'is',
                                        'value'     => '1b3c774b-afb8-42e0-8928-f6a240120000',
                                    ],
                                ],
                        ],
                    ],
            ],
        ],
    'group'  => 'questionOption',
    'type'   => 'pie',
]);

$campaignService = new \Buzz\Control\Services\CampaignService($buzz);
$campaign        = $campaignService->where('identifier', 'is', 'automechanika-2016')->getMany()->first();

$reportService = new \Buzz\Control\Services\ReportService($buzz);
$response      = $reportService->get($report, $campaign);

var_dump($response);