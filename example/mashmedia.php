<?php

require_once 'bootstrap.php';

set_time_limit(600);

$orderService   = new \Buzz\Control\Services\OrderService($buzz);
$scannerService = new \Buzz\Control\Services\ScannerService($buzz);

$filter = (new \Buzz\Control\Filter())
    ->add('status', 'is not', 'cancelled')
    ->addGroup(
        (new \Buzz\Control\Filter())
            ->add('products.identifier', 'is', 'handiscan')
            ->orAdd('products.identifier', 'is', 'smartscan')
    );

/** @var \Buzz\Control\Objects\Order[] $orders */
$orders = $orderService
    ->setFilter($filter)
    ->with('products')
    ->perPage(999)
    ->getMany();

$scannersCreated = 0;

foreach ($orders as $order) {
    foreach ($order->getProducts() as $orderProduct) {
        $scanner = new \Buzz\Control\Objects\Scanner();
        $scanner->setExhibitorId($order->getExhibitorId());
        $scanner->setCustomerId($order->getCustomerId());
        $scanner->setOrderProductId($orderProduct->getId());
        $scanner->setType($orderProduct->getIdentifier());
        $scanner->setPurpose('exhibitor');
        $scanner->setActive('yes');
        $scanner->setPaid($order->getPaid() === 'no' ? 'no' : 'yes');

        for ($i = 1; $i <= $orderProduct->getQuantity(); $i++) {
            $scannersCreated++;
//            $scannerService->save($scanner);
        }
    }
}

echo "$scannersCreated scanners created.";
