<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class VisaTemplate
 *
 * @property string $identifier
 * @property string $name
 * @property string $html
 */
class VisaTemplate extends SdkObject
{
    use SupportRead,
        SupportWrite,
        HasFiles;
}
