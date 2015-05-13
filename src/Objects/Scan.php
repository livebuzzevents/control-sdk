<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Entrance\Scanner;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects\Badge
 */
class Scan extends Object
{
    /**
     * @var array
     */
    protected $objectMap = [
        'badge'   => Badge::class,
        'scanner' => Scanner::class
    ];

    /**
     * @var
     */
    protected $badge;

    /**
     * @var
     */
    protected $barcode;

    /**
     * @var
     */
    protected $scanner;

    /**
     * @return mixed
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @param mixed $badge
     */
    public function setBadge(Badge $badge)
    {
        $this->badge = $badge;
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

    /**
     * @return mixed
     */
    public function getScanner()
    {
        return $this->scanner;
    }

    /**
     * @param mixed $scanner
     */
    public function setScanner(Scanner $scanner)
    {
        $this->scanner = $scanner;
    }
}