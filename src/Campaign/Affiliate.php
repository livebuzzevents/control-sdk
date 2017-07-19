<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Affiliate
 *
 * @property string $name
 * @property string $token
 * @property string $stream_id
 * @property int $cost
 * @property-read string $url
 * @property-read string $pretty_url
 * @property-read string $currency
 *
 * @property-read \Buzz\Control\Campaign\Stream $stream
 */
class Affiliate extends Object
{
    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Affiliate
     */
    public function create(array $attributes): Affiliate
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
     * @return \Buzz\Control\Campaign\Affiliate|null
     */
    public function first(array $filters = []): ?Affiliate
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Affiliate|null
     */
    public function find(string $id): ?Affiliate
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
