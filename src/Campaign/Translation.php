<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class Translation
 *
 * @property string $language
 * @property string $field
 * @property string $translation
 *
 */
class Translation extends SdkObject
{
    use Morphable;
}
