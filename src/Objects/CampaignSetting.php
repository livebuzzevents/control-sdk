<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class CampaignSetting
 *
 * @package Buzz\Control\Objects
 */
class CampaignSetting extends Base
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
