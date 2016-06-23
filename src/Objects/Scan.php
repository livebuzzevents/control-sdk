<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToBadge;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToScanner;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects
 */
class Scan extends Object
{
    use BelongsToBadge, BelongsToScanner, BelongsToCustomer;

    /**
     * @var string
     */
    protected $barcode;

    public function __construct($data)
    {
        parent::__construct($data);

        if (!empty($this->badge->customer)) {
            $this->customer    = $this->badge->customer;
            $this->customer_id = $this->customer->id;
        }

        if (!empty($this->badge)) {
            $this->barcode = $this->badge->barcode;
        }
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }
}