<?php

require_once '../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer('93666753-e348-4d1a-bdb4-86448fcf0000');

$service = new \Buzz\Control\Services\CustomerService($buzz);

$image = $service->getQrCodeImage($customer, 125);

echo '<pre>';
echo '<img src="' . $image . '" />';
echo '</pre>';
