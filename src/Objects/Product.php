<?php namespace Buzz\Control\Objects;

/**
 * Class Product
 *
 * @package Buzz\Control\Objects\Channel
 */
class Product extends Object
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $description;

    /**
     * @var
     */
    protected $cost;

    /**
     * @var
     */
    protected $currency;

    /**
     * @var
     */
    protected $campaign_id;

    /**
     * @var
     */
    protected $shippable;

    /**
     * @var
     */
    protected $badge_type_id;

    /**
     * @return mixed
     */
    public function getShippable()
    {
        return $this->shippable;
    }

    /**
     * @param mixed $shippable
     */
    public function setShippable($shippable)
    {
        $this->shippable = $shippable;
    }

    /**
     * @return mixed
     */
    public function getBadgeTypeId()
    {
        return $this->badge_type_id;
    }

    /**
     * @param mixed $badge_type_id
     */
    public function setBadgeTypeId($badge_type_id)
    {
        $this->badge_type_id = $badge_type_id;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param mixed $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}