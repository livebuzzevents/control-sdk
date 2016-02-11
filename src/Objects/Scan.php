<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToBadge;
use Buzz\Control\Objects\Traits\BelongsToScanner;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects
 */
class Scan extends Object
{
    use BelongsToBadge, BelongsToScanner;

    /**
     * @var string
     */
    protected $barcode;

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