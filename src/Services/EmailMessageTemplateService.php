<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\EmailMessageTemplate;

/**
 * Class EmailMessageTemplateService
 *
 * @package Buzz\Control\Services
 */
class EmailMessageTemplateService extends Service
{
    /**
     * @var
     */
    protected static $cast = EmailMessageTemplate::class;

    /**
     * @param EmailMessageTemplate $emailMessageTemplate
     *
     * @return EmailMessageTemplate
     * @throws ErrorException
     */
    public function get(EmailMessageTemplate $emailMessageTemplate)
    {
        if (!$emailMessageTemplate->getId()) {
            throw new ErrorException('EmailMessageTemplate id required!');
        }

        return $this->callAndCast('get', "email-message-template/{$emailMessageTemplate->getId()}");
    }

    /**
     * @param EmailMessageTemplate $emailMessageTemplate
     *
     * @throws ErrorException
     */
    public function delete(EmailMessageTemplate $emailMessageTemplate)
    {
        if (!$emailMessageTemplate->getId()) {
            throw new ErrorException('EmailMessageTemplate id required!');
        }

        $this->call('delete', "email-message-template/{$emailMessageTemplate->getId()}");
    }

    /**
     * @param EmailMessageTemplate $emailMessageTemplate
     *
     * @return EmailMessageTemplate
     * @throws ErrorException
     */
    public function save(EmailMessageTemplate $emailMessageTemplate)
    {
        if ($emailMessageTemplate->getId()) {
            $verb = 'put';
            $url  = 'email-message-template/' . $emailMessageTemplate->getId();
        } else {
            $verb = 'post';
            $url  = 'email-message-template';
        }

        return $this->callAndCast($verb, $url, $emailMessageTemplate->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'email-message-templates');
    }

    /**
     * @return EmailMessageTemplate[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'email-message-templates');
    }

    /**
     * @param EmailMessageTemplate[] $emailMessageTemplates
     *
     * @return EmailMessageTemplate[]
     * @throws ErrorException
     */
    public function saveMany(array $emailMessageTemplates)
    {
        foreach ($emailMessageTemplates as $key => $emailMessageTemplate) {
            $emailMessageTemplates[$key] = $emailMessageTemplate->toArray();
        }

        return $this->callAndCastMany('post', 'email-message-templates', ['batch' => $emailMessageTemplates]);
    }
}
