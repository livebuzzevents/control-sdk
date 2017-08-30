<?php

namespace Buzz\Control\Traits;

use JTDSoft\EssentialsSdk\Cast;
use JTDSoft\EssentialsSdk\Collection;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;
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
     *
     * @return \JTDSoft\EssentialsSdk\Collection
     */
    public function get(iterable $filters = null, $page = 1, $per_page = 50): Collection
    {
        if ($filters instanceof Traversable) {
            $filters = iterator_to_array($filters);
        }

        return Cast::many(
            static::class,
            $this->api()->get($this->getEndpoint(), compact('filters', 'page', 'per_page'))
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
