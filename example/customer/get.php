<?php

use Buzz\Control\Campaign\Customer;
use Buzz\Control\Filter;

require_once '../bootstrap.php';

$filter = new Filter;
$filter->add('status', 'is not', 'active');

$customer = (new Customer)->first($filter);

dd($customer);

$customer = (new Customer);

$customer->status = 'active';

$customer->save();

$customer->status = 'pending';

$customer->save();

dd('here');

// $customer = \Buzz\Control\Campaign\Customer::first();

dd($customer->id);
