<?php

require_once '../bootstrap.php';

set_time_limit(0);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$customers = $service
    ->where('badgeType.identifier', 'is', 'volunteer-events')
    ->where('answers.options.questionOption.identifier', 'is', 'saturday')
    ->perPage(1000)
    ->order('last_name')
    ->getMany();

//dd($customers->getTotal());

foreach ($customers as $key => $customer) {
    while (true) {
        try {
            $service->smartPrint($customer, [
                '7f6c1452-3faa-4bfa-a754-dce2a8ef0004' => [
                    ['id' => 2, 'priority' => 1],
                ],
            ]);

            print 'Printed: ' . $customer->id . PHP_EOL;

            usleep(2000000);

            break;
        } catch (\Exception $e) {

            print 'Error: ' . $customer->id . '||' . $e->getMessage() . PHP_EOL;
        }
    }
}

echo '<pre>';
//var_dump($response);
echo '</pre>';
