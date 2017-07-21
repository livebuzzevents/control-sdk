<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class BadgeStock
 *
 * @property string $customer_id
 * @property string $bulk_print_id
 * @property string $printer_identifier
 * @property boolean $printed
 * @property boolean $onsite
 * @property integer $order
 *
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\BulkPrint $bulk_print
 */
class BadgeStock extends Object
{
    use SupportRead,
        SupportWrite;
}
