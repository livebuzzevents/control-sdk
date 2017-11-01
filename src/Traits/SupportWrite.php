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
        $instance = (new static($attributes));

        $instance->save();

        return $instance;
    }

    /**
     *
     */
    public function save(): void
    {
        if (!$this->isDirty()) {
            return;
        }

        if ($this->id) {
            $this->copyFromArray(
                $this->api()->put($this->getEndpoint($this->id), $this->toArray(true))
            );
        } else {
            $this->copyFromArray(
                $this->api()->post($this->getEndpoint(), $this->toArray(true))
            );
        }

        $this->cleanDirtyAttributes();
    }
}
