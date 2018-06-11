<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Invite
 *
 * @property string $token
 * @property string $customer_id
 * @property string $created_by_customer_id
 * @property string $created_by_exhibitor_id
 * @property string $stream_id
 * @property string $badge_type_id
 * @property string $status
 * @property string $provider
 * @property string $provider_sender
 * @property string $provider_recipient
 * @property string $subject
 * @property string $message
 * @property-read string $url
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Customer $created_by_customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $created_by_exhibitor
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\BadgeType $badge_type
 */
class Invite extends SdkObject
{
    use SupportRead,
        SupportWrite;

    /**
     * @param string $email_message_template_id
     * @return string
     */
    public function preview(string $email_message_template_id): string
    {
        return $this->api()->post(
            $this->getEndpoint("preview/{$email_message_template_id}"),
            $this->prepareRequestData()
        );
    }
}
