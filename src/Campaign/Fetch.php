<?php

namespace Buzz\Control\Campaign;

/**
 * Class Fetch
 */
class Fetch extends SdkObject
{
    /**
     * Get array of country code with nationality
     *
     * @return array
     */
    public function nationalities()
    {
        return $this->api()->get($this->getEndpoint("nationalities"));
    }
}
