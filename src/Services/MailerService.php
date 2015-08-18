<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Mailer;

/**
 * Class MailerService
 *
 * @package Buzz\Control\Services
 */
class MailerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Mailer::class;

    /**
     * @param Mailer $mailer
     *
     * @return Mailer
     * @throws ErrorException
     */
    public function send(Mailer $mailer)
    {
        if ((!$mailer->getEmail()->getId() && !$mailer->getEmail()->getIdentifier()) ||
            (!$mailer->getCustomer() && !$mailer->getExhibitor())
        ) {
            throw new ErrorException('Email and Customer/Exhibitor required!');
        }

        return $this->callAndCast('post', 'email/send', $mailer->toArray());
    }
}
