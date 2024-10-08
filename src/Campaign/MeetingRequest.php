<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\SdkObject as EssentialsSdkObject;

/**
 * Class MeetingRequest
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
class MeetingRequest extends SdkObject
{
    use SupportRead;

    public function requestWithCustomer(Customer $host, Customer $guest, MeetingSlot $meetingSlot): EssentialsSdkObject
    {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/%s/%s/request-with-customer', $host->id, $guest->id, $meetingSlot->id)),
                request()->all()
            )
        );
    }

    public function requestWithExhibitor(
        Exhibitor $host,
        Customer $guest,
        MeetingSlot $meetingSlot
    ): EssentialsSdkObject {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/%s/%s/request-with-exhibitor', $host->id, $guest->id, $meetingSlot->id)),
                request()->all()
            )
        );
    }

    public function reschedule(Customer $customer, MeetingSlot $meetingSlot): EssentialsSdkObject
    {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/%s/reschedule/%s', $customer->id, $this->id, $meetingSlot->id)),
                request()->all()
            )
        );
    }

    public function reassign(Customer $customer, MeetingSlot $meetingSlot, string $type): EssentialsSdkObject
    {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/%s/reassign/%s/%s', $customer->id, $this->id, $meetingSlot->id, $type)),
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

    public function accept(): EssentialsSdkObject
    {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/accept', $this->id)),
                request()->all()
            )
        );
    }

    public function decline(): EssentialsSdkObject
    {
        return Cast::single(
            (new MeetingRequest()),
            $this->api()->post(
                $this->getEndpoint(sprintf('%s/decline', $this->id)),
                request()->all()
            )
        );
    }
}
