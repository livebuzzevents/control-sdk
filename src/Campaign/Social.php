<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Social
 *
 * @property string $provider
 * @property string $provider_id
 * @property string $provider_token
 * @property array $details
 * @property int $reach
 *
 */
class Social extends SdkObject
{
    use Morphable,
        SupportCrud;

    /**
     * @param \Buzz\Control\Campaign\Customer $customer
     * @param \Buzz\Control\Campaign\Invite $invite
     * @param string $email_message_template_id
     *
     * @return \Buzz\Control\Campaign\Invite
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function inviteEmail(Customer $customer, Invite $invite, string $email_message_template_id)
    {
        if (!$invite->provider_recipient) {
            throw new ErrorException('Email required!');
        }

        return new Invite(
            $this->api()->post(
                $this->getEndpoint("invite/{$customer->id}/email/{$email_message_template_id}"),
                $invite->prepareRequestData()
            )
        );
    }

    /**
     * @param \Buzz\Control\Campaign\Customer $customer
     * @param \Buzz\Control\Campaign\Invite $invite
     *
     * @return \Buzz\Control\Campaign\Invite
     */
    public function inviteShare(Customer $customer, Invite $invite)
    {
        return new Invite(
            $this->api()->post(
                $this->getEndpoint("invite/{$customer->id}/{$invite->provider}/share"),
                $invite->prepareRequestData()
            )
        );
    }

    /**
     * @param \Buzz\Control\Campaign\Customer $customer
     * @param \Buzz\Control\Campaign\Invite $invite
     *
     * @return \Buzz\Control\Campaign\Invite
     */
    public function inviteConnection(Customer $customer, Invite $invite)
    {
        return new Invite(
            $this->api()->post(
                $this->getEndpoint("invite/{$customer->id}/{$invite->provider}/connection"),
                $invite->prepareRequestData()
            )
        );
    }
}
