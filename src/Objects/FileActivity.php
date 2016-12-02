<?php

namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToStreamMenuItem;

/**
 * Class FileActivity
 *
 * @package Buzz\Contract\Objects
 */
class FileActivity extends Base
{
    use BelongsToCustomer,
        BelongsToExhibitor,
        BelongsToFile;
}
