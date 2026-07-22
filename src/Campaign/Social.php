<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Social
 *
 * @property string $provider
 * @property string $provider_id
 * @property string $provider_token
 * @property array $details
 * @property int $reach
 */
class Social extends SdkObject
{
    use Morphable,
        SupportCrud;

    /**
     * @param  string  $email_message_template_id
     * @return Invite
     *
     * @throws ErrorException
     */
    public function inviteEmail(Customer $customer, Invite $invite, array $input)
    {
        if (! $invite->provider_recipient) {
            throw new ErrorException('Email required!');
        }

        return new Invite(
            $this->api()->post(
                $this->getEndpoint("invite/{$customer->id}/email/{$input['invite_email']}"),
                array_merge($invite->prepareRequestData(), $input)
            )
        );
    }

    /**
     * @return Invite
     */
    public function inviteShare(Customer $customer, Invite $invite, ?string $stream_id = null)
    {
        return new Invite(
            $this->api()->post(
                $this->getEndpoint("invite/{$customer->id}/{$invite->provider}/share/$stream_id"),
                $invite->prepareRequestData()
            )
        );
    }

    /**
     * @return Invite
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
