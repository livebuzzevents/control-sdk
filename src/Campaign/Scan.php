<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Scan
 *
 * @property string $barcode
 * @property string $customer_id
 * @property string $scanner_id
 * @property-read \Buzz\Control\Campaign\Scanner $scanner
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 *
 */
class Scan extends Object
{
    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Scan
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
     * @return \Buzz\Control\Campaign\Scan|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Scan|null
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
