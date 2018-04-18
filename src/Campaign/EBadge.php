<?php

namespace Buzz\Control\Campaign;

use Traversable;

/**
 * Class EBadge
 */
class EBadge extends SdkObject
{
    /**
     * @param iterable $filters
     * @param int $page
     * @param int $per_page
     * @param null $order
     * @param null $direction
     *
     * @return string
     */
    public function get(
        iterable $filters = null,
        $page = 1,
        $per_page = 50,
        $order = null,
        $direction = null
    ): string {
        if ($filters instanceof Traversable) {
            $filters = iterator_to_array($filters);
        }

        return $this->api()->get(
            $this->getEndpoint(),
            compact('filters', 'page', 'per_page', 'order', 'direction')
        )['e-badge'];
    }
}
