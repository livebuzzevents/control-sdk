<?php

require_once '../bootstrap.php';

$filter = new \Buzz\Control\Filter();

$filter->set([
    [
        'node_name',
        'not in',
        ['HOMESTEAD', 'N2'],
        true,
    ],
    [
        'group' => [
            ['node_name', 'is', 'HOMESTEAD'],
            ['node_sequence', '>', '1', true],
        ],
        'or'    => true,
    ],
    [
        'group' => [
            ['node_name', 'is', 'N2'],
            ['node_sequence', '>', '1', true],
        ],
        'or'    => true,
    ],
]);

$service  = new \Buzz\Control\Services\EventService($buzz);
$response = $service->setFilter($filter)->order('created_at')->direction('desc')->getMany();

var_dump($response);