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
     *
     */
    public function delete(): void
    {
        $this->_delete();
    }
}
