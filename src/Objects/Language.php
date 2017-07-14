<?php namespace Buzz\Control\Objects;

/**
 * Class Language
 *
 * @package Buzz\Control
 */
class Language extends Base
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $native_name;

    /**
     * @var string
     */
    protected $iso;

    /**
     * @var string
     */
    protected $iso2;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNativeName()
    {
        return $this->native_name;
    }

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @return string
     */
    public function getIso2()
    {
        return $this->iso2;
    }
}
