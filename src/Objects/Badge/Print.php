<?php namespace Buzz\Control\Objects\Badge;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToBadge;

/**
 * Class Badge
 *
 * @package Buzz\Control\Objects
 */
class BadgePrint extends Object
{
    use BelongsToBadge;

    /**
     * @var string
     */
    protected $printer_identifier;

    /**
     * @return string
     */
    public function getPrinterIdentifier()
    {
        return $this->printer_identifier;
    }

    /**
     * @param string $printer_identifier
     */
    public function setPrinterIdentifier($printer_identifier)
    {
        $this->printer_identifier = $printer_identifier;
    }
}