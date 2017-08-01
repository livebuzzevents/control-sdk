<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportDelete
 *
 * @package Buzz\Control\Traits
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
