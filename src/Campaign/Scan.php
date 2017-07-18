<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Scan
 *
 * @property string $barcode
 * @property string $customer_id
 * @property string $scanner_id
 *
 * @property-read \Buzz\Control\Campaign\Scanner $scanner
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 *
 */
class Scan extends Object
{
}
