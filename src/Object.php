<?php

namespace Buzz\Control;

use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Object
 *
 * @property string $id
 * @property \DateTime $updated_at
 * @property \DateTime $created_at
 */
class Object extends \JTDSoft\EssentialsSdk\Core\Object
{
    /**
     * @var string
     */
    protected $endpoint_prefix = '';

    /**
     * Override default service
     *
     * @return \Buzz\Control\Service
     */
    protected function service(): Service
    {
        return new Service();
    }

    /**
     * @param string|null $path
     *
     * @return string
     */
    protected function getEndpoint(string $path = null): string
    {
        $resource = kebab_case(str_plural(class_basename(static::class)));

        if ($this->endpoint_prefix) {
            $endpoint = $this->endpoint_prefix . '/' . $resource;
        } else {
            $endpoint = $resource;
        }

        if ($path) {
            $endpoint .= '/' . ltrim($path, '/');
        }

        return ltrim($endpoint, '/');
    }

    /**
     * Deletes model
     *
     * @return mixed
     */
    protected function _delete(): void
    {
        $this->api()->delete($this->getEndpoint($this->id));
    }

    /**
     * Reloads the object
     *
     * @return mixed
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    protected function _reload(): void
    {
        if (!$this->id) {
            throw new ErrorException('id required for reload');
        }

        $this->copyFromArray(
            $this->api()->get($this->getEndpoint($this->id))
        );
    }

    /**
     * Reloads the object
     *
     * @param string $id
     *
     * @return mixed
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    protected function _find(string $id): ?Object
    {
        $object = new static();

        $object->id = $id;

        $object->_reload();

        return $object;
    }

    /**
     *
     */
    protected function _save(): void
    {
        if ($this->id) {
            $this->copyFromArray(
                $this->api()->put($this->getEndpoint($this->id), $this->data)
            );
        } else {
            $this->copyFromArray(
                $this->api()->post($this->getEndpoint(), $this->data)
            );
        }
    }

    /**
     * @param array $attributes
     *
     * @return mixed $object
     */
    protected function _create(array $attributes = []): mixed
    {
        return (new static($attributes))->save();
    }

    /**
     * @param array $filters
     * @param int $page
     * @param int $per_page
     *
     * @return \JTDSoft\EssentialsSdk\Core\Collection
     */
    protected function _get(array $filters = [], $page = 1, $per_page = 50): Collection
    {
        return Cast::many(
            static::class,
            $this->api()->get($this->getEndpoint(), compact('filters', 'page', 'per_page'))
        );
    }

    /**
     * @param array $filters
     *
     * @return Object|mixed
     */
    protected function _first(array $filters = []): ?Object
    {
        return $this->_get($filters, 1, 1)->first();
    }
}
