<?php

namespace Buzz\Control\Campaign;

/**
 * Class CustomerLoginToken
 *
 * @property string $token
 * @property string $customer_id
 * @property string $stream_id
 * @property-read bool $expired
 * @property-read Customer $customer
 * @property-read Stream $stream
 */
class CustomerLoginToken extends SdkObject {}
