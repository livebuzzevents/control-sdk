<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Product
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $destination
 * @property string $exhibitor_id
 * @property integer $cost
 * @property-read integer $vat
 * @property integer $vat_percentage
 * @property-read integer $total
 * @property string $shippable
 * @property string $publish
 * @property-read string $currency
 * @property string $active
 * @property \DateTime $valid_from
 * @property \DateTime $valid_to
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $order_products
 */
class Product extends Object
{
    use Translatable;

    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Product
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
     * @return \Buzz\Control\Campaign\Product|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Product|null
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
