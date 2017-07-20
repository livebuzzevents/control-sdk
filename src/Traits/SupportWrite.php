<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportWrite
 *
 * @package Buzz\Control\Traits
 */
trait SupportWrite
{
    /**
     * @param array $attributes
     *
     * @return self
     */
    public function create(array $attributes): self
    {
        return $this->_create($attributes);
    }

    /**
     *
     */
    public function save(): void
    {
        $this->_save();
    }
}
