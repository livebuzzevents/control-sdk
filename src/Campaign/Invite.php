<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Invite
 *
 * @property string $token
 * @property string $customer_id
 * @property string $created_by_customer_id
 * @property string $created_by_exhibitor_id
 * @property string $stream_id
 * @property string $badge_type_id
 * @property string $status
 * @property string $provider
 * @property string $provider_sender
 * @property string $provider_recipient
 * @property string $subject
 * @property string $message
 * @property-read string $url
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Customer $created_by_customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $created_by_exhibitor
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\BadgeType $badge_type
 */
class Invite extends Object
{
    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Invite
     */
    public function create(array $attributes): self
    {
        return $this->_create($attributes);
    }

    /**
     *
     */
    public function save(): void
    {
        $this->_save();
    }

    /**
     * @param array $filters
     * @param int $page
     * @param int $per_page
     *
     * @return \JTDSoft\EssentialsSdk\Core\Collection
     */
    public function get(array $filters = [], $page = 1, $per_page = 50): Collection
    {
        return $this->_get($filters, $page, $per_page);
    }

    /**
     * @param array $filters
     *
     * @return \Buzz\Control\Campaign\Invite|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Invite|null
     */
    public function find(string $id): ?self
    {
        return $this->_find($id);
    }

    /**
     *
     */
    public function reload(): void
    {
        $this->_reload();
    }
}
