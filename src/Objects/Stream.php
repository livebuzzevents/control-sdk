<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Stream
 *
 * @package Buzz\Control\Objects
 */
class Stream extends Object
{
    use BelongsToCampaign, HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $origin_url;

    /**
     * @var \Buzz\Control\Objects\Affiliate[]
     */
    protected $affiliates;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOriginUrl()
    {
        return $this->origin_url;
    }

    /**
     * @param mixed $origin_url
     */
    public function setOriginUrl($origin_url)
    {
        $this->origin_url = $origin_url;
    }

    /**
     * @return Affiliate[]|null
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    /**
     * @param Affiliate[]|Collection $affiliates
     */
    public function setAffiliates($affiliates)
    {
        $this->affiliates = new Collection($affiliates);
    }

    /**
     * @param Affiliate $affiliate
     */
    public function addAffiliate(Affiliate $affiliate)
    {
        $this->add($this->affiliates, $affiliate);
    }
}