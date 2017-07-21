<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Affiliate
 *
 * @property string $name
 * @property string $token
 * @property string $stream_id
 * @property int $cost
 * @property-read string $url
 * @property-read string $pretty_url
 * @property-read string $currency
 *
 * @property-read \Buzz\Control\Campaign\Stream $stream
 */
class Affiliate extends Object
{
    use SupportRead,
        SupportDelete;
}
