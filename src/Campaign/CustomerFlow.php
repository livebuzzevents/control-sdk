<?php

namespace Buzz\Control\Campaign;

/**
 * Class CustomerFlow
 *
 * @property string $token
 * @property string $customer_id
 * @property string $stream_id
 * @property integer $step
 * @property array $current_items
 * @property array $saved_items
 * @property string $status
 * @property-read string $signed_url
 *
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Stream $stream
 */
class CustomerFlow extends Object
{
}
