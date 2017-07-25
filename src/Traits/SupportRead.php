<?php

namespace Buzz\Control\Traits;

use Buzz\Control\Filter;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Trait SupportRead
 *
 * @package Buzz\Control\Traits
 */
trait SupportRead
{
    /**
     * @param iterable $filters
     * @param int $page
     * @param int $per_page
     *
     * @return \JTDSoft\EssentialsSdk\Core\Collection
     */
    public function get(iterable $filters = null, $page = 1, $per_page = 50): Collection
    {
        return $this->_get($filters, $page, $per_page);
    }

    /**
     * @param iterable $filters
     *
     * @return static|null
     */
    public function first(iterable $filters = null): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return self|null
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
