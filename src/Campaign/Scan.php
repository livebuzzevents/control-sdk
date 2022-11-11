<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

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
 *
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
}
