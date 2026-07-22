<?php

namespace Buzz\Control\Campaign;

/**
 * Class Balance
 *
 * @property string $customer_id
 * @property string $amount
 * @property bool $currency
 * @property-read Customer $customer
 * @property-read BalanceTransaction[] $transactions
 */
class Balance extends SdkObject {}
