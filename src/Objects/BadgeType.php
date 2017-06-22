<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class BadgeType
 *
 * @package Buzz\Control\Objects
 */
class BadgeType extends Base
{
    use HasIdentifier,
        Translatable;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $print_name;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrintName()
    {
        return $this->print_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }
}
