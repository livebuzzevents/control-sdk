<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;

/**
 * Class Theater
 *
 * @property string $identifier
 * @property string $name
 * @property string $type
 * @property string $color
 * @property string $text_color_hexstring
 * @property-read \Buzz\Control\Campaign\Seminar[] $seminars
 */
class Theater extends SdkObject
{
    use SupportRead,
        SupportWrite;

    public function meetingLocations(Customer $customer)
    {
        return Cast::many(
            (new Theater()),
            $this->api()->get($this->getEndpoint(sprintf('%s/%s', $customer->id, 'meeting-locations')))
        );
    }
}
