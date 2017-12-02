<?php

namespace Buzz\Control\Traits;

use JTDSoft\EssentialsSdk\Cast;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;
use JTDSoft\EssentialsSdk\Paging;
use Traversable;

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
     * @param null $order
     * @param null $direction
     *
     * @return \JTDSoft\EssentialsSdk\Paging
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function get(
        iterable $filters = null,
        $page = 1,
        $per_page = 50,
        $order = null,
        $direction = null
    ): Paging {
        if ($filters instanceof Traversable) {
            $filters = iterator_to_array($filters);
        }

        return Cast::many(
            $this,
            $this->api()->get($this->getEndpoint(), compact('filters', 'page', 'per_page', 'order', 'direction'))
        );
    }

    /**
     * @param iterable $filters
     *
     * @return static|null
     */
    public function first(iterable $filters = null): ?self
    {
        if ($filters instanceof Traversable) {
            $filters = iterator_to_array($filters);
        }

        return $this->get($filters, 1, 1)->first();
    }

    /**
     * @param string $id
     *
     * @return self|null
     */
    public function find(string $id): ?self
    {
        $object = clone $this;

        $object->data = [];

        $object->id = $id;

        $object->reload();

        return $object;
    }

    /**
     *
     */
    public function reload(): void
    {
        if (!$this->id) {
            throw new ErrorException('id required for reload');
        }

        $this->copyFromArray(
            $this->api()->get($this->getEndpoint($this->id))
        );

        $this->cleanDirtyAttributes();
    }
}
