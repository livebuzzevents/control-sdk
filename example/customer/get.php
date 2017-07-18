<?php

require_once '../bootstrap.php';

$customer = \Buzz\Control\Campaign\Customer::find('490ed86f-3a5d-452a-8b97-1a4b9c750000');

//$customer = \Buzz\Control\Campaign\Customer::first();

dd($customer->id);

