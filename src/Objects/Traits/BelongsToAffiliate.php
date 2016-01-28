<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Affiliate;

/**
 * Class BelongsToAffiliate
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToAffiliate
{
    /**
     * @var string
     */
    protected $affiliate_id;

    /**
     * @var \Buzz\Control\Objects\Affiliate
     */
    protected $affiliate;

    /**
     * @return \Buzz\Control\Objects\Affiliate
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }

    /**
     * @param Affiliate $affiliate
     */
    public function setAffiliate(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
    }

    /**
     * @return string
     */
    public function getAffiliateId()
    {
        return $this->affiliate_id;
    }

    /**
     * @param string $affiliate_id
     */
    public function setAffiliateId($affiliate_id)
    {
        $this->affiliate_id = $affiliate_id;
    }
}