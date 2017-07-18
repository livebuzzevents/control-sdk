<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Scanner
 *
 * @property string $identifier
 * @property string $seminar_id
 * @property string $exhibitor_id
 * @property string $customer_id
 * @property string $order_product_id
 * @property string $entrance_id
 * @property string $serial_number
 * @property string $paid
 * @property string $type
 * @property string $purpose
 * @property string $direction
 * @property string $delivery_status
 * @property array $details
 * @property-read boolean $handles_crossovers
 *
 * @property-read \Buzz\Control\Campaign\Scan[] $scan
 * @property-read \Buzz\Control\Campaign\SmartScanCode[] $smart_scan_codes
 *
 */
class Scanner extends Object
{
}
