<?php

require_once '../bootstrap.php';

$customerService = new \Buzz\Control\Services\CustomerService($buzz);
$seminarService  = new \Buzz\Control\Services\SeminarService($buzz);

$seminars = $seminarService->with(['attendees'])->getAll()->keyBy('identifier');

$customerService
    ->with(['orders.products.product', 'orders.products.actions'])
    ->where('orders', 'has')
    ->chunk(15, function ($customers) use ($seminarService, $seminars) {
        foreach ($customers as $customer) {
            foreach ($customer->orders as $order) {
                foreach ($order->products as $orderProduct) {
                    if (!isset($seminars[$orderProduct->product->identifier])) {
                        echo "Seminar not found for identifier: $orderProduct->product->identifier\n";
                    }

                    $seminar = $seminars[$orderProduct->product->identifier];

                    foreach ($orderProduct->actions as $action) {
                        if ($action->name == 'update-customer') {
                            $customerId = $action->parameters['customer_id'];

                            if ($seminar->attendees->where('customer_id', $customerId)->isEmpty()) {
                                $seminarService->attachCustomer(
                                    $seminar,
                                    $customer,
                                    'attendee',
                                    new \Buzz\Control\Objects\Customer($customerId)
                                );
                            }
                        }
                    }
                }
            }
        }
    });
