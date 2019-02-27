<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class CampaignSettings
 *
 * @property string $identifier
 * @property string $value
 */
class CampaignSetting extends SdkObject
{
    use SupportRead;

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->api()->get($this->getEndpoint("/all"));
    }
}
