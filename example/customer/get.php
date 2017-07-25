<?php

require_once '../bootstrap.php';

$customer = (new \Buzz\Control\Campaign\Customer());

$customer->status = 'active';

$customer->save();

$customer->status = 'pending';

$customer->save();

dd('here');

//$customer = \Buzz\Control\Campaign\Customer::first();

dd($customer->id);

