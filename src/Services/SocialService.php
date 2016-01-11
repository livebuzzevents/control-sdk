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
    /**
     * @var
     */
    protected static $cast = Invite::class;

    public function inviteEmail(Invite $invite, EmailTemplate $emailTemplate, $subject, $message)
    {
        if (!$invite->getProviderRecipient()) {
            throw new ErrorException('Email required!');
        }

        $request = [
            'invite'  => $invite->toArray(),
            'subject' => $subject,
            'message' => $message
        ];

        if ($emailTemplate->getId()) {
            $request['email_template_id'] = $emailTemplate->getId();
        } else {
            $request['email_template'] = $emailTemplate->toArray();
        }

        $this->call('post', 'social/invite/email', $request);
    }

    public function inviteShare(Invite $invite, $message)
    {
        $request = [
            'invite'  => $invite->toArray(),
            'message' => $message
        ];

        $this->call('post', "social/invite/{$invite->getProvider()}/share", $request);
    }

    public function inviteConnection(Invite $invite, $subject, $message)
    {
        $request = [
            'invite'  => $invite->toArray(),
            'subject' => $subject,
            'message' => $message
        ];

        $this->call('post', "social/invite/{$invite->getProvider()}/connection", $request);
    }
}
