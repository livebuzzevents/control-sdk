<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToCharge
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToCharge
{
    /**
     * @var string
     */
    protected $charge_id;

    /**
     * @var \Buzz\Control\Objects\Charge
     */
    protected $charge;

    /**
     * @return \Buzz\Control\Objects\Charge
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @return string
     */
    public function getChargeId()
    {
        return $this->charge_id;
    }

    /**
     * @param string $charge_id
     */
    public function setChargeId($charge_id)
    {
        $this->charge_id = $charge_id;
    }
}