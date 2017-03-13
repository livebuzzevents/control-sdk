<?php namespace Buzz\Control\Objects;

/**
 * Class EmailMessage
 *
 * @package Buzz\Control\Objects\EmailMessage
 */
class EmailMessage extends Base
{
    /**
     * @var string
     */
    protected $email_message_template_id;

    /**
     * @var \Buzz\Control\Objects\EmailMessageTemplate
     */
    protected $email_message_template;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var int
     */
    protected $clicks;

    /**
     * @var int
     */
    protected $opens;

    /**
     * @var \Buzz\Control\Objects\EmailMessageTemplate
     */
    protected $string;

    public function getEmailMessageTemplateId()
    {
        return $this->email_message_template_id;
    }

    /**
     * @return \Buzz\Control\Objects\EmailMessageTemplate
     */
    public function getEmailMessageTemplate()
    {
        return $this->email_message_template;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * @return int
     */
    public function getOpens()
    {
        return $this->opens;
    }
}
