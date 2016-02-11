<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToScanner
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToScanner
{
    /**
     * @var string
     */
    protected $scanner_id;

    /**
     * @var \Buzz\Control\Objects\Scanner
     */
    protected $scanner;

    /**
     * @return \Buzz\Control\Objects\Scanner
     */
    public function getScanner()
    {
        return $this->scanner;
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