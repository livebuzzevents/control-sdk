<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportWrite
 */
trait SupportWrite
{
    public function create(array $attributes): self
    {
        $instance = (new static($attributes));

        $instance->save();

        return $instance;
    }

    public function save(): void
    {
        if (! $this->isDirty()) {
            return;
        }

        if ($this->id) {
            $this->copyFromArray(
                $this->api()->put($this->getEndpoint($this->id), $this->prepareRequestData())
            );
        } else {
            $this->copyFromArray(
                $this->api()->post($this->getEndpoint(), $this->prepareRequestData())
            );
        }

        $this->cleanDirtyAttributes();
    }
}
