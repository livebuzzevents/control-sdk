<?php

namespace Buzz\Control\Organization;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Channel
 *
 * @property string $identifier
 * @property string $name
 *
 * @property-read \Buzz\Control\Organization\Campaign[] $campaigns
 */
class Channel extends Object
{
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
     * @return \Buzz\Control\Organization\Channel|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Organization\Channel|null
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
