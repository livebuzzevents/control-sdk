<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class DynamicImage
 *
 * @property string $name
 * @property string $identifier
 * @property string $render_url
 * @property int $width
 * @property int $height
 * @property array $elements
 * @property array $images
 */
class DynamicImage extends SdkObject
{
    use SupportRead;
}
