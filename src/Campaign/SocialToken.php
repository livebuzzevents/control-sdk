<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class SocialToken
 *
 * @property string $token
 * @property string $customer_id
 * @property string $stream_id
 * @property string $provider
 * @property-read string $url
 * @property-read boolean $expired
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Stream $stream
 *
 */
class SocialToken extends Object
{
}
