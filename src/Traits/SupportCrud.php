<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportCrud
 *
 * @package Buzz\Control\Traits
 */
trait SupportCrud
{
    use SupportRead,
        SupportWrite,
        SupportDelete;
}
