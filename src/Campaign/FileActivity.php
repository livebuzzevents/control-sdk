<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class FileActivity
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $file_id
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\File $file
 */
class FileActivity extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
