<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Seminar
 *
 * @property string $title
 * @property string $description
 * @property int $capacity
 * @property string $location
 * @property array $additional_info
 * @property \DateTime $ends_at
 * @property \DateTime $starts_at
 * @property string $publish
 * @property string $bookable
 * @property string $private
 * @property-read int $spaces_taken
 * @property-read int $spaces_available
 * @property-read Exhibitor $exhibitor
 * @property-read CustomerSideEvent[] $registrations
 * @property-read CustomerSideEvent[] $confirmed_registrations
 * @property-read Category[] $categories
 */
class SideEvent extends SdkObject
{
    use SupportCrud,
        HasFiles;
}