<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Seminar
 *
 * @property string $identifier
 * @property string $title
 * @property string $description
 * @property string $exhibitor_id
 * @property integer $capacity
 * @property string $colour
 * @property string $location
 * @property string $publish
 * @property array $settings
 * @property \DateTime $ends_at
 * @property \DateTime $starts_at
 * @property-read integer $spaces_taken
 * @property-read integer $spaces_available
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $customers
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $attendees
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $speakers
 * @property-read \Buzz\Control\Campaign\Scanner[] $scanners
 * @property-read \Buzz\Control\Campaign\SeminarTopic[] $topics
 */
class Seminar extends Object
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
