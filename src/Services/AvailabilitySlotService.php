<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\AvailabilitySlot;

/**
 * Class AvailabilitySlotService
 *
 * @package Buzz\Control\Services
 */
class AvailabilitySlotService extends Service
{
    /**
     * @var
     */
    protected static $cast = AvailabilitySlot::class;

    /**
     * @param AvailabilitySlot $availabilitySlot
     *
     * @return AvailabilitySlot
     * @throws ErrorException
     */
    public function get(AvailabilitySlot $availabilitySlot)
    {
        if (!$availabilitySlot->getId()) {
            throw new ErrorException('AvailabilitySlot id required!');
        }

        return $this->callAndCast('get', "availability-slot/{$availabilitySlot->getId()}");
    }

    /**
     * @param AvailabilitySlot $availabilitySlot
     *
     * @throws ErrorException
     */
    public function delete(AvailabilitySlot $availabilitySlot)
    {
        if (!$availabilitySlot->getId()) {
            throw new ErrorException('AvailabilitySlot id required!');
        }

        $this->call('delete', "availability-slot/{$availabilitySlot->getId()}");
    }

    /**
     * @param AvailabilitySlot $availabilitySlot
     *
     * @return AvailabilitySlot
     * @throws ErrorException
     */
    public function save(AvailabilitySlot $availabilitySlot)
    {
        if ($availabilitySlot->getId()) {
            $verb = 'put';
            $url  = 'availability-slot/' . $availabilitySlot->getId();
        } else {
            $verb = 'post';
            $url  = 'availability-slot';
        }

        return $this->callAndCast($verb, $url, $availabilitySlot->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'availability-slots');
    }

    /**
     * @return AvailabilitySlot[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'availability-slots');
    }

    /**
     * @param AvailabilitySlot[] $availabilitySlots
     *
     * @return AvailabilitySlot[]
     * @throws ErrorException
     */
    public function saveMany(array $availabilitySlots)
    {
        foreach ($availabilitySlots as $key => $availabilitySlot) {
            $availabilitySlots[$key] = $availabilitySlot->toArray();
        }

        return $this->callAndCastMany('post', 'availability-slots', ['batch' => $availabilitySlots]);
    }
}
