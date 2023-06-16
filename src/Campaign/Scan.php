<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Scan
 *
 * @property string $barcode
 * @property string $customer_id
 * @property string $scanner_id
 * @property integer $score
 * @property-read \Buzz\Control\Campaign\Scanner $scanner
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 */
class Scan extends SdkObject
{
    use SupportRead,
        SupportWrite,
        WithAnswerHelpers,
        WithPropertyHelpers;

    /**
     * @param Exhibitor $exhibitor
     *
     * @return array
     */
    public function leadScores(Exhibitor $exhibitor): array
    {
        return $this->api()->get($this->getEndpoint("lead-scores/{$exhibitor->id}"));
    }

    /**
     * @param Customer $customer
     * @param string $type
     * @param int $page
     * @param int $per_page
     * @param string $order
     * @param string $direction
     * @param array $filters
     *
     * @return Collection
     * @throws ErrorException
     */
    public function contentCapture(
        Customer $customer,
        string $type,
        int $page = 1,
        int $per_page = 50,
        string $order = '',
        string $direction = '',
        array $filters = []
    ): Collection {
        return Cast::many(
            $this,
            $this->api()->get(
                $this->getEndpoint("content-capture/{$customer->id}/$type"),
                compact('page', 'per_page', 'order', 'direction', 'filters')
            )
        );
    }
}
