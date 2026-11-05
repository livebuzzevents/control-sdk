<?php

namespace Buzz\Control\Traits;

/**
 * Trait SupportCrud
 */
trait SupportCrud
{
    use SupportDelete,
        SupportRead,
        SupportWrite;
}
