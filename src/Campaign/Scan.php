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
 * @property int $score
 * @property-read Scanner $scanner
 * @property-read Customer $customer
 * @property-read Answer[] $answers
 * @property-read Property[] $properties
 * @property-read Note[] $notes
 */
class Scan extends SdkObject
{
    use SupportRead,
        SupportWrite,
        WithAnswerHelpers,
        WithPropertyHelpers;

    public function leadScores(Exhibitor $exhibitor): array
    {
        return $this->api()->get($this->getEndpoint("lead-scores/{$exhibitor->id}"));
    }

    /**
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

    public function setStarRating(): void
    {
        $this->api()->post($this->getEndpoint('set-star-rating'), request()->only(['scan_id', 'rating']));
    }
}
