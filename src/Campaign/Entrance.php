<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Entrance
 *
 * @property string $identifier
 * @property string $name
 * @property boolean $handles_crossovers
 * @property-read \Buzz\Control\Campaign\Scanner $scanners
 */
class Entrance extends Object
{
    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Entrance
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
     * @return \Buzz\Control\Campaign\Entrance|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Entrance|null
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
