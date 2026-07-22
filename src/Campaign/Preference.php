<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Preference
 *
 * @property bool $campaign_email
 * @property bool $campaign_mail
 * @property bool $campaign_phone
 * @property bool $campaign_sms
 * @property bool $organization_email
 * @property bool $organization_mail
 * @property bool $organization_phone
 * @property bool $organization_sms
 * @property bool $third_party_email
 * @property bool $third_party_mail
 * @property bool $third_party_phone
 * @property bool $third_party_sms
 */
class Preference extends SdkObject
{
    use Morphable,
        SupportCrud;

    /**
     * Answers a question
     */
    public function save(): void
    {
        if (! $this->isDirty()) {
            return;
        }

        $this->copyFromArray(
            $this->api()->post($this->getEndpoint(), $this->prepareRequestData(false))
        );

        $this->cleanDirtyAttributes();
    }
}
