<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToScan
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToScan
{
    /**
     * @var string
     */
    protected $scan_id;

    /**
     * @var \Buzz\Control\Objects\Scan
     */
    protected $scan;

    /**
     * @return \Buzz\Control\Objects\Scan
     */
    public function getScan()
    {
        return $this->scan;
    }

    /**
     * @return string
     */
    public function getScanId()
    {
        return $this->scan_id;
    }

    /**
     * @param string $scan_id
     */
    public function setScanId($scan_id)
    {
        $this->scan_id = $scan_id;
    }
}
