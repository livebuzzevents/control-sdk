<?php

require_once '../bootstrap.php';

$basket = new \Buzz\Control\Objects\Basket('0dea83aa-3df4-4623-a6ac-34263ae50000');

$service = new \Buzz\Control\Services\BasketService($buzz);

//$basket = $service->setBillingDetails($basket, [
//    'email'      => 'demo@livebuzz.co.uk',
//    'title'      => 'Mr',
//    'first_name' => 'Yordan',
//    'last_name'  => 'Dobrev',
//    'postcode'   => 'B928HA',
//    'line_1'     => '67 Wellsford Avenue',
//    'city'       => 'Solihull',
//    'country'    => 'UK',
//]);

//$basket = $service->unsetBillingDetails($basket);
//
//$basket = $service->setShippingDetails($basket, [
//    'email'      => 'demo@livebuzz.co.uk',
//    'title'      => 'Mr',
//    'first_name' => 'Yordan',
//    'last_name'  => 'Dobrev',
//    'postcode'   => 'B928HA',
//    'line_1'     => '67 Wellsford Avenue',
//    'city'       => 'Solihull',
//    'country'    => 'UK',
//]);

//$basket = $service->unsetShippingDetails($basket);

dd($basket);