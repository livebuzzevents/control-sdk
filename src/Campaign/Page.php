<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Page
 *
 * @property string $identifier
 * @property string $active
 * @property string $description
 * @property string $stream_id
 * @property string $parent_id
 * @property string $title
 * @property string $icon
 * @property string $color
 * @property string $background_image
 * @property string $content
 * @property string $type
 * @property string $value
 * @property string $locked
 * @property int $order
 * @property string $settings
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\Page $parent
 * @property-read \Buzz\Control\Campaign\File[] $files
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 */
class Page extends Object
{
    use SupportRead,
        SupportWrite,
        Translatable,
        WithPropertyHelpers;
}
