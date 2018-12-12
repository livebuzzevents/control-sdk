<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Article
 *
 * @property string $title
 * @property string $content
 * @property boolean $featured
 * @property string $publish
 * @property string $category_id
 * @property-read \Buzz\Control\Campaign\Category $category
 */
class Article extends SdkObject
{
    use Morphable,
        SupportCrud;
}
