<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class StreamPageActivity
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $stream_menu_item_id
 * @property integer $action
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\StreamMenuItem $stream_menu_item
 */
class StreamPageActivity extends Object
{
    use SupportRead,
        SupportWrite;
}
