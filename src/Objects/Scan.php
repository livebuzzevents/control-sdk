<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToScanner;
use Buzz\Control\Objects\Traits\HasAnswersCommon;

/**
 * Class Scan
 *
 * @package Buzz\Control\Objects
 */
class Scan extends Base
{
    use BelongsToScanner, BelongsToCustomer, HasAnswersCommon;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var \Buzz\Control\Objects\Scan\Answer[]
     */
    protected $answers;

    /**
     * @var \Buzz\Control\Objects\Note[]
     */
    protected $notes;

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

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
