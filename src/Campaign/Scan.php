<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use JTDSoft\EssentialsSdk\Collection;

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
class Scan extends SdkObject
{
    use WithAnswerHelpers,
        WithPropertyHelpers;

    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Scan
     */
    public function create(array $attributes): self
    {
        return $this->execCreate($attributes);
    }

    /**
     *
     */
    public function save(): void
    {
        $this->execSave();
    }

    /**
     * @param array $filters
     * @param int $page
     * @param int $per_page
     *
     * @return \JTDSoft\EssentialsSdk\Collection
     */
    public function get(array $filters = [], $page = 1, $per_page = 50): Collection
    {
        return $this->execGet($filters, $page, $per_page);
    }

    /**
     * @param array $filters
     *
     * @return \Buzz\Control\Campaign\Scan|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->execFirst($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Scan|null
     */
    public function find(string $id): ?self
    {
        return $this->execFind($id);
    }

    /**
     *
     */
    public function reload(): void
    {
        $this->execReload();
    }
}
