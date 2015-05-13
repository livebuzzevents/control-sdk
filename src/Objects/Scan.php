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
    protected $badge_id;

    /**
     * @var
     */
    protected $barcode;

    /**
     * @var
     */
    protected $scanner;

    /**
     * @var
     */
    protected $scanner_id;

    /**
     * @return mixed
     */
    public function getBadge()
    {
        return $this->badge;
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
     * @return mixed
     */
    public function getBadgeId()
    {
        return $this->badge_id;
    }

    /**
     * @param mixed $badge_id
     */
    public function setBadgeId($badge_id)
    {
        $this->badge_id = $badge_id;
    }

    /**
     * @return mixed
     */
    public function getScannerId()
    {
        return $this->scanner_id;
    }

    /**
     * @param mixed $scanner_id
     */
    public function setScannerId($scanner_id)
    {
        $this->scanner_id = $scanner_id;
    }
}