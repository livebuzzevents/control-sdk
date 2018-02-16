<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

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
 * @property-read string $signed_leads_download_link
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Seminar $seminar
 * @property-read \Buzz\Control\Campaign\OrderProduct $order_product
 * @property-read \Buzz\Control\Campaign\Entrance $entrance
 * @property-read \Buzz\Control\Campaign\Scan[] $scans
 * @property-read \Buzz\Control\Campaign\SmartScanCode[] $smart_scan_codes
 * @property-read \Buzz\Control\Campaign\Redemption[] $redemptions
 */
class Scanner extends SdkObject
{
    use SupportRead,
        SupportWrite;

    /**
     * @param string|null $exhibitor_id
     * @param string|null $customer_id
     * @param string|null $paid
     *
     * @return static
     */
    public function createSmartScanner(
        string $exhibitor_id = null,
        string $customer_id = null,
        string $paid = null
    ) {
        return new static(
            $this->api()->post(
                $this->getEndpoint('create-smart-scanner'),
                compact('exhibitor_id', 'customer_id', 'paid')
            )
        );
    }
}
