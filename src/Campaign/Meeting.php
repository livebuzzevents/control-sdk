<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\SdkObject as EssentialsSdkObject;

/**
 * Class Meeting
 *
 * @property string $status
 * @property string $location_id
 * @property string $location_other
 * @property string $guest_id
 * @property string $host_id
 * @property string $meeting_slot_id
 * @property string $meeting_happened
 * @property-read \Buzz\Control\Campaign\Theater $location
 * @property-read \Buzz\Control\Campaign\Customer $guest
 * @property-read \Buzz\Control\Campaign\Customer $host
 * @property-read \Buzz\Control\Campaign\MeetingSlot $meeting_slot
 */
class Meeting extends SdkObject
{
    use SupportRead, SupportWrite;

    public function customerGuestAvailability(Customer $customer): array
    {
        return $this->api()->get($this->getEndpoint(sprintf('%s/customer-guest-availability', $customer->id)));
    }

    public function customerHostAvailability(Customer $guest, Customer $host): array
    {
        return $this->api()
            ->get($this->getEndpoint(sprintf('%s/%s/customer-host-availability', $guest->id, $host->id)));
    }

    public function reschedule(Customer $customer, MeetingSlot $meetingSlot): EssentialsSdkObject
    {
        return Cast::single(
            (new Meeting()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/%s/reschedule/%s', $customer->id, $this->id, $meetingSlot->id)),
                request()->all()
            )
        );
    }

    public function cancel(): bool
    {
        return $this->api()->post(
            $this->getEndpoint(sprintf('%s/cancel', $this->id)),
            request()->all()
        );
    }
}
