<?php

namespace Buzz\Control\Campaign;

/**
 * Class Meeting
 *
 * @property string $status
 * @property string $location_id
 * @property string $location_other
 * @property string $guest_id
 * @property string $host_id
 * @property string $meeting_slot_id
 * @property-read \Buzz\Control\Campaign\Theater $location
 * @property-read \Buzz\Control\Campaign\Customer $guest
 * @property-read \Buzz\Control\Campaign\Customer $host
 * @property-read \Buzz\Control\Campaign\MeetingSlot $meeting_slot
 */
class Meeting extends SdkObject
{
}
