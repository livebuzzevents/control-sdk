<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportDelete
 */
trait SupportDelete
{
    /**
     * Deletes by id
     */
    public function delete(): void
    {
        $this->api()->delete($this->getEndpoint($this->id));
    }
}
