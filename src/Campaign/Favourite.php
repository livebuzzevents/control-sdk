<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Favourite
 *
 * @property string $owner_id
 * @property string $type
 * @property bool $scanned
 * @property bool $invite
 * @property-read Customer $customer
 * @property-read Exhibitor $exhibitor
 * @property-read Product $product
 * @property-read Seminar $seminar
 */
class Favourite extends SdkObject
{
    use Morphable,
        SupportCrud;
}
