<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class VisaLetter
 *
 * @property string $status
 * @property string $customer_id
 * @property string $visa_template_id
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\VisaTemplate $visaTemplate
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 */
class VisaLetter extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Taggable,
        WithAnswerHelpers;
}
