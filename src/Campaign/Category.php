<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class Category
 *
 * @property string $identifier
 * @property string $name
 *
 * @property-read \Buzz\Control\Campaign\Article[] $articles
 */
class Category extends SdkObject
{
    use SupportRead;
}
