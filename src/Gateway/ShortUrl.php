<?php

namespace Buzz\Control\Gateway;

use Buzz\Control\Traits\SupportRead;

/**
 * Class ShortUrl
 *
 * @property string $code
 * @property string $url
 */
class ShortUrl extends SdkObject
{
    use SupportRead;
}
