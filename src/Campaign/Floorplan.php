<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Floorplan
 *
 * @property string $identifier
 * @property string $name
 * @property int $order
 */
class Floorplan extends SdkObject
{
    use SupportRead,
        HasFiles,
        Translatable;
}
