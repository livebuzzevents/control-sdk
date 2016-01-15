<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\EmailTemplate;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Invite;

/**
 * Class SocialService
 *
 * @package Buzz\Control\Services
 */
class SocialService extends Service
{
    protected static $cast = Invite::class;

    public function inviteEmail(Invite $invite, EmailTemplate $emailTemplate)
    {
        if (!$invite->getProviderRecipient()) {
            throw new ErrorException('Email required!');
        }

        $request = ['invite'  => $invite->toArray()];

        if ($emailTemplate->getId()) {
            $request['email_template_id'] = $emailTemplate->getId();
        } else {
            $request['email_template'] = $emailTemplate->toArray();
        }

        return $this->callAndCast('post', 'social/invite/email', $request);
    }

    public function inviteShare(Invite $invite)
    {
        $request = ['invite' => $invite->toArray()];
        return $this->callAndCast('post', "social/invite/{$invite->getProvider()}/share", $request);
    }

    public function inviteConnection(Invite $invite)
    {
        $request = ['invite'  => $invite->toArray()];
        return $this->callAndCast('post', "social/invite/{$invite->getProvider()}/connection", $request);
    }
}
