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
 *
 */
class Scan extends SdkObject
{
    use SupportRead,
        SupportWrite,
        WithAnswerHelpers,
        WithPropertyHelpers;

    /**
     * @param Customer $customer
     *
     * @return \Buzz\EssentialsSdk\Collection
     * @throws ErrorException
     */
    public function visitorConnect(
        Customer $customer,
        $page = 1,
        $per_page = 50
    ): Collection
    {
        return Cast::many(
            $this,
            $this->api()->get($this->getEndpoint("visitor-connect/{$customer->id}"), compact('page', 'per_page'))
        );
    }
}
