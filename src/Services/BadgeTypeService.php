<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeType;

/**
 * Class BadgeTypeService
 *
 * @package Buzz\Control\Services
 */
class BadgeTypeService extends Service
{
    /**
     * @var
     */
    protected static $cast = BadgeType::class;

    /**
     * @param BadgeType $badge_type
     *
     * @return BadgeType
     * @throws ErrorException
     */
    public function get(BadgeType $badge_type)
    {
        if (!$badge_type->getId()) {
            throw new ErrorException('BadgeType id required!');
        }

        return $this->callAndCast('get', "badge-type/{$badge_type->getId()}");
    }

    /**
     * @param BadgeType $badge_type
     *
     * @throws ErrorException
     */
    public function delete(BadgeType $badge_type)
    {
        if (!$badge_type->getId()) {
            throw new ErrorException('BadgeType id required!');
        }

        $this->call('delete', "badge-type/{$badge_type->getId()}");
    }

    /**
     * @param BadgeType $badge_type
     *
     * @return BadgeType
     * @throws ErrorException
     */
    public function save(BadgeType $badge_type)
    {
        if ($badge_type->getId()) {
            $verb = 'put';
            $url  = 'badge-type/' . $badge_type->getId();
        } else {
            $verb = 'post';
            $url  = 'badge-type';
        }

        return $this->callAndCast($verb, $url, $badge_type->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'badge-types');
    }

    /**
     * @return BadgeType[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'badge-types');
    }

    /**
     * @param BadgeType[] $badge_types
     *
     * @return BadgeType[]
     * @throws ErrorException
     */
    public function saveMany(array $badge_types)
    {
        foreach ($badge_types as $key => $badge_type) {
            $badge_types[$key] = $badge_type->toArray();
        }

        return $this->callAndCastMany('post', 'badge-types', ['batch' => $badge_types]);
    }
}
