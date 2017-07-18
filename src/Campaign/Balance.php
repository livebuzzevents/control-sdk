<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Balance
 *
 * @property string $customer_id
 * @property string $amount
 * @property boolean $currency
 *
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\BalanceTransaction[] $transactions
 *
 */
class Balance extends Object
{
}
