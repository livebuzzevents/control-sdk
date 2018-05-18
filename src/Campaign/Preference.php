<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Preference
 *
 * @property boolean $campaign_email
 * @property boolean $campaign_mail
 * @property boolean $campaign_phone
 * @property boolean $campaign_sms
 * @property boolean $organization_email
 * @property boolean $organization_mail
 * @property boolean $organization_phone
 * @property boolean $organization_sms
 * @property boolean $third_party_email
 * @property boolean $third_party_mail
 * @property boolean $third_party_phone
 * @property boolean $third_party_sms
 *
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
        if (!$this->isDirty()) {
            return;
        }

        $this->copyFromArray(
            $this->api()->post($this->getEndpoint(), $this->prepareRequestData(false))
        );

        $this->cleanDirtyAttributes();
    }
}
