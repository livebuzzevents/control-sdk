<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class ExhibitorPressRelease
 *
 * @property string $exhibitor_id
 * @property string $title
 * @property string $content
 *
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 */
class ExhibitorPressRelease extends Object
{
    use SupportRead,
        SupportWrite;
}
