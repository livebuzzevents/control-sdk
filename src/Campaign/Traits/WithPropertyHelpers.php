<?php

namespace Buzz\Control\Campaign\Traits;

/**
 * Class WithPropertyHelpers
 */
trait WithPropertyHelpers
{
    /**
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
