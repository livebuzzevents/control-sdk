<?php

require_once '../bootstrap.php';

$filter = new \Buzz\Control\Filter();
$filter->add('status', 'is not', 'active');

$customer = (new \Buzz\Control\Campaign\Customer())->get($filter);

dd('here22');

$customer = (new \Buzz\Control\Campaign\Customer());

$customer->status = 'active';

$customer->save();

$customer->status = 'pending';

$customer->save();

dd('here');

//$customer = \Buzz\Control\Campaign\Customer::first();

dd($customer->id);

