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
 * @property string $product_id
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
 * @property-read bool $handles_crossovers
 * @property-read string $signed_leads_download_link
 * @property-read string $signed_product_leads_download_link
 * @property-read Customer $customer
 * @property-read Exhibitor $exhibitor
 * @property-read Seminar $seminar
 * @property-read OrderProduct $order_product
 * @property-read Entrance $entrance
 * @property-read Scan[] $scans
 * @property-read SmartScanCode[] $smart_scan_codes
 * @property-read Redemption[] $redemptions
 */
class Scanner extends SdkObject
{
    use SupportRead,
        SupportWrite;

    /**
     * @return static
     */
    public function createSmartScanner(
        ?string $exhibitor_id = null,
        ?string $customer_id = null,
        ?string $paid = null
    ) {
        return new static(
            $this->api()->post(
                $this->getEndpoint('create-smart-scanner'),
                compact('exhibitor_id', 'customer_id', 'paid')
            )
        );
    }
}
