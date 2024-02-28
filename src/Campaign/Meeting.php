<?php

namespace Buzz\Control\Campaign;

use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\SdkObject as EssentialsSdkObject;
use Illuminate\Support\Collection;

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
    public function guestAvailability(Customer $customer): array
    {
        return $this->api()->get($this->getEndpoint(sprintf('%s/guest-availability', $customer->id)));
    }

    public function customerHostAvailability(Customer $guest, Customer $host): array
    {
        return $this->api()->get($this->getEndpoint(sprintf('%s/%s/customer-host-availability', $guest->id, $host->id)));
    }

    public function exhibitorHostAvailability(Customer $guest, Exhibitor $host): array
    {
        return $this->api()->get($this->getEndpoint(sprintf('%s/%s/exhibitor-host-availability', $guest->id, $host->id)));
    }
}
