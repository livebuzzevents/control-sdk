<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToAffiliate
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToAffiliate
{
    /**
     * @var int
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
     * @return int
     */
    public function getAffiliateId()
    {
        return $this->affiliate_id;
    }

    /**
     * @param int $affiliate_id
     */
    public function setAffiliateId($affiliate_id)
    {
        $this->affiliate_id = $affiliate_id;
    }
}