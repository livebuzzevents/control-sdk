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
 * @property-read Allowance $allowance
 * @property-read Customer $customer
 */
class Redemption extends SdkObject
{
    use Morphable,
        Refinable,
        SupportDelete,
        SupportRead;

    /**
     * @return Redemption
     */
    public function redeemScanner($allowance_id, SdkObject $object, $type)
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
     * @return Redemption
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
     * @return Redemption
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
     * @return Redemption
     */
    public function redeemBadgeType($allowance_id, $customer_id, $badge_type_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/badge-type/{$allowance_id}/{$customer_id}/{$badge_type_id}")
            )
        );
    }

    /**
     * @return Redemption
     */
    public function redeemArticle($allowance_id, $exhibitor_id, $article_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/article/{$allowance_id}/{$exhibitor_id}/{$article_id}")
            )
        );
    }

    /**
     * @return Redemption
     */
    public function redeemVideo($allowance_id, $exhibitor_id, $link_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/video/{$allowance_id}/{$exhibitor_id}/{$link_id}")
            )
        );
    }

    public function redeemProduct($allowance_id, $exhibitor_id, $product_id)
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("redeem/product/{$allowance_id}/{$exhibitor_id}/{$product_id}")
            )
        );
    }
}
