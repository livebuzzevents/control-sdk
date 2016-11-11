<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class BadgePrint
 *
 * @package Buzz\Control\Objects
 */
class BadgePrint extends Base
{
    use BelongsToCustomer;

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
