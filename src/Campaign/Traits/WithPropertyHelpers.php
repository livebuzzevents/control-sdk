<?php namespace Buzz\Control\Campaign\Traits;

/**
 * Class WithPropertyHelpers
 *
 * @package Buzz\Control\Campaign\Traits
 */
trait WithPropertyHelpers
{
    /**
     * @param $identifier
     *
     * @return null
     */
    public function getPropertyByIdentifier($identifier)
    {
        return $this->properties ? $this->properties->where('parameter.identifier', $identifier)->first() : null;
    }

    /**
     * @return static
     */
    public function getPropertiesIdentifiers()
    {
        return $this->properties ? $this->properties->pluck('parameter.identifier') : null;
    }
}
