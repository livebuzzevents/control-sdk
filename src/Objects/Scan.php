<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToBadge;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects
 */
class Scan extends Object
{
    use BelongsToBadge;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var \Buzz\Control\Objects\Entrance\Scanner
     */
    protected $scanner;

    /**
     * @var string
     */
    protected $scanner_id;

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

    /**
     * @return Entrance\Scanner
     */
    public function getScanner()
    {
        return $this->scanner;
    }

    /**
     * @param Entrance\Scanner $scanner
     */
    public function setScanner(Entrance\Scanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * @return string
     */
    public function getScannerId()
    {
        return $this->scanner_id;
    }

    /**
     * @param string $scanner_id
     */
    public function setScannerId($scanner_id)
    {
        $this->scanner_id = $scanner_id;
    }
}