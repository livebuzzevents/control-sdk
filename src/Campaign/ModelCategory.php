<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class ModelCategory
 *
 * @property string $category_id
 *
 * @property-read Category $category
 */
class ModelCategory extends SdkObject
{
    use Morphable;
}
