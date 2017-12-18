<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Campaign\Traits\Refinable;
use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Redemption
 *
 * @property string $allowance_id
 * @property-read \Buzz\Control\Campaign\Allowance $allowance
 */
class Redemption extends Object
{
    use Morphable,
        Refinable,
        SupportRead,
        SupportDelete;

    /**
     * @param $allowance_id
     * @param Object $object
     * @param $type
     *
     * @return \Buzz\Control\Campaign\Redemption
     */
    public function redeemScanner($allowance_id, Object $object, $type)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/scanner/{$allowance_id}"),
                [
                    'model_type' => class_basename($object),
                    'model_id'   => $object->id,
                    'type'       => $type,
                ]
            )
        );
    }

    /**
     * @param $allowance_id
     * @param $scanner_id
     *
     * @return \Buzz\Control\Campaign\Redemption
     */
    public function redeemExistingScanner($allowance_id, $scanner_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/existing-scanner/{$allowance_id}/{$scanner_id}")
            )
        );
    }

    /**
     * @param $allowance_id
     * @param $customer_id
     * @param $seminar_id
     *
     * @return \Buzz\Control\Campaign\Redemption
     */
    public function redeemSeminar($allowance_id, $customer_id, $seminar_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/seminar/{$allowance_id}/{$customer_id}/{$seminar_id}")
            )
        );
    }

    /**
     * @param $allowance_id
     * @param $customer_id
     * @param $badge_type_id
     *
     * @return \Buzz\Control\Campaign\Redemption
     */
    public function redeemBadgeType($allowance_id, $customer_id, $badge_type_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/badge-type/{$allowance_id}/{$customer_id}/{$badge_type_id}")
            )
        );
    }
}
