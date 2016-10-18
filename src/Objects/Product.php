<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasActive;
use Buzz\Control\Objects\Traits\HasDestination;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Product
 *
 * @package Buzz\Control\Objects\Channel
 */
class Product extends Object
{
    use BelongsToCampaign, BelongsToExhibitor, HasIdentifier, HasDestination, HasActive;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $cost;

    /**
     * @var int
     */
    protected $vat_percentage;

    /**
     * @var int
     */
    protected $vat;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $shippable;

    /**
     * @var \DateTime
     */
    protected $valid_from;

    /**
     * @var \DateTime
     */
    protected $valid_to;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

    /**
     * @return string
     */
    public function getShippable()
    {
        return $this->shippable;
    }

    /**
     * @param string $shippable
     */
    public function setShippable($shippable)
    {
        $this->shippable = $shippable;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->valid_from;
    }

    /**
     * @param \DateTime $valid_from
     */
    public function setValidFrom($valid_from)
    {
        $this->valid_from = $valid_from;
    }

    /**
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->valid_to;
    }

    /**
     * @param \DateTime $valid_to
     */
    public function setValidTo($valid_to)
    {
        $this->valid_to = $valid_to;
    }

    /**
     * @return int
     */
    public function getVatPercentage()
    {
        return $this->vat_percentage;
    }

    /**
     * @param int $vat_percentage
     */
    public function setVatPercentage($vat_percentage)
    {
        $this->vat_percentage = $vat_percentage;
    }

    /**
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File[]|Collection $files
     */
    public function setFiles($files)
    {
        $this->files = new Collection($files);
    }
}
