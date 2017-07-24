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
 * @property integer $reach
 *
 */
class Social extends Object
{
    use Morphable,
        SupportCrud;

    /**
     * @param \Buzz\Control\Campaign\Invite $invite
     * @param \Buzz\Control\Campaign\EmailMessageTemplate $emailMessageTemplate
     *
     * @return \Buzz\Control\Campaign\Invite
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function inviteEmail(Invite $invite, EmailMessageTemplate $emailMessageTemplate)
    {
        if (!$invite->provider_recipient) {
            throw new ErrorException('Email required!');
        }

        $request = ['invite' => $invite->toArray()];

        if ($emailMessageTemplate->id) {
            $request['email_message_template_id'] = $emailMessageTemplate->id;
        } else {
            $request['email_message_template'] = $emailMessageTemplate->toArray();
        }

        return new Invite($this->post($this->getEndpoint('invite/email'), $request));
    }

    /**
     * @param \Buzz\Control\Campaign\Invite $invite
     *
     * @return \Buzz\Control\Campaign\Invite
     */
    public function inviteShare(Invite $invite)
    {
        $request = ['invite' => $invite->toArray()];

        return new Invite($this->post($this->getEndpoint("invite/{$invite->provider}/share"), $request));
    }

    /**
     * @param \Buzz\Control\Campaign\Invite $invite
     *
     * @return \Buzz\Control\Campaign\Invite
     */
    public function inviteConnection(Invite $invite)
    {
        $request = ['invite' => $invite->toArray()];

        return new Invite($this->post($this->getEndpoint("invite/{$invite->provider}/connection"), $request));
    }
}
