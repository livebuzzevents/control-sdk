<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToScanner;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects
 */
class Scan extends Base
{
    use BelongsToScanner, BelongsToCustomer;

    /**
     * @var string
     */
    protected $barcode;

    public function __construct($data)
    {
        parent::__construct($data);

        if (!empty($this->customer)) {
            $this->barcode = $this->customer->barcode;
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
