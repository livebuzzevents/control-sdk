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
 * @property-read Customer $customer
 * @property-read Exhibitor $exhibitor
 * @property-read File $file
 */
class FileActivity extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
