<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class PaymentProvider
 *
 * @property string $provider
 * @property string $instructions
 * @property array $settings
 * @property array $fees
 * @property string $destination
 * @property string $active
 *
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 */
class PaymentProvider extends Object
{
}
