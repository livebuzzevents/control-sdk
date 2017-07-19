<?php

require_once '../bootstrap.php';

$customer = (new \Buzz\Control\Campaign\Customer());

$customer->fresh();

//$customer = \Buzz\Control\Campaign\Customer::first();

dd($customer->id);

