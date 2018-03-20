<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class ExhibitorPressRelease
 *
 * @property string $exhibitor_id
 * @property string $title
 * @property string $content
 *
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 */
class ExhibitorPressRelease extends SdkObject
{
    use SupportCrud;
}
