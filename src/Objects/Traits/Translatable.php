<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Translation;
use StdClass;

/**
 * Class Translatable
 *
 * @package Buzz\Control\Objects\Traits
 */
trait Translatable
{
    /**
     * @var object
     */
    protected $translation;

    /**
     * @var \Buzz\Control\Objects\Translation[]
     */
    protected $translations;

    /**
     * @return StdClass
     */
    public function getTranslation(): StdClass
    {
        return $this->translation;
    }

    /**
     * @param Translation $address
     */
    public function addAddress(Translation $address)
    {
        $this->add($this->translations, $address);
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->translations;
    }

    /**
     * @param Translation[]|Collection $addresses
     */
    public function setAddresses($addresses)
    {
        $this->translations = new Collection($addresses);
    }
}
