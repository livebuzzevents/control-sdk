<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class BadgeType
 *
 * @property string $identifier
 * @property string $name
 * @property string $print_name
 * @property string $badge_stock_id
 * @property string $stream_id
 * @property string $color
 * @property array $settings
 * @property string $url
 * @property string $e_badge_line_1
 * @property string $e_badge_line_2
 * @property string $e_badge_line_3
 * @property string $e_badge_qrcode
 * @property string $e_badge_html
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 */
class BadgeType extends Object
{
    use Translatable;

    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\BadgeType
     */
    public function create(array $attributes): BadgeType
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
     * @return \Buzz\Control\Campaign\BadgeType|null
     */
    public function first(array $filters = []): ?BadgeType
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\BadgeType|null
     */
    public function find(string $id): ?BadgeType
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
